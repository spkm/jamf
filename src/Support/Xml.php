<?php

namespace spkm\Jamf\Support;

use BackedEnum;
use DateTimeInterface;
use DOMDocument;
use DOMElement;
use Illuminate\Support\Str;
use InvalidArgumentException;
use JsonException;
use Saloon\Http\Response;
use SimpleXMLElement;
use Stringable;

/**
 * The XML the Classic API takes and answers writes with. A record goes as an element named for its kind holding
 * an element per field; a list of records goes as one element per record, named for the singular of the list
 * (mobile_devices holds mobile_device elements), or for the one key a record is given under.
 */
final class Xml
{
    /**
     * Whether an answer is XML: by its content type, or by its body when the type says nothing.
     */
    public static function isXml(Response $response): bool
    {
        $type = strtolower((string) $response->header('Content-Type'));

        if (str_contains($type, 'json')) {
            return false;
        }

        return str_contains($type, 'xml') || str_starts_with(ltrim($response->body()), '<?xml');
    }

    /**
     * A record as the Classic API takes it: <$root> holding an element for each field.
     *
     * @param  array<array-key, mixed>  $record
     */
    public static function fromArray(string $root, array $record): string
    {
        $document = new DOMDocument('1.0', 'UTF-8');
        $element = $document->createElement(self::name($root));
        $document->appendChild($element);
        self::append($document, $element, $record, $root);

        return (string) $document->saveXML($document->documentElement);
    }

    /**
     * The fields of an XML answer as an array, without its outer element: <mobile_device><id>5</id></mobile_device>
     * gives ['id' => '5']. An element repeated under one parent becomes a list.
     *
     * @return array<string, mixed>
     *
     * @throws JsonException When the body isn't XML.
     */
    public static function toArray(string $xml): array
    {
        $previous = libxml_use_internal_errors(true);

        try {
            $element = simplexml_load_string($xml, SimpleXMLElement::class, LIBXML_NONET | LIBXML_NOCDATA);
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }

        if ($element === false) {
            throw new JsonException('The answer is not XML.');
        }

        $value = self::read($element);

        return is_array($value) ? $value : ['value' => $value];
    }

    private static function read(SimpleXMLElement $element): mixed
    {
        $counts = [];

        foreach ($element->children() as $name => $child) {
            $counts[$name] = ($counts[$name] ?? 0) + 1;
        }

        $children = [];

        foreach ($element->children() as $name => $child) {
            if ($counts[$name] > 1) {
                $children[$name][] = self::read($child);
            } else {
                $children[$name] = self::read($child);
            }
        }

        return $children === [] ? (string) $element : $children;
    }

    /**
     * @param  array<array-key, mixed>  $values
     */
    private static function append(DOMDocument $document, DOMElement $parent, array $values, string $parentName): void
    {
        if (array_is_list($values)) {
            foreach ($values as $item) {
                if (is_array($item) && count($item) === 1 && ! array_is_list($item) && is_array(reset($item))) {
                    self::append($document, $parent, $item, $parentName);

                    continue;
                }

                self::appendValue($document, $parent, Str::singular($parentName), $item);
            }

            return;
        }

        foreach ($values as $name => $value) {
            // A list under its own singular, as toArray() reads repeated elements (mobile_devices holding
            // ['mobile_device' => [...]]): one element per item, not one wrapping them all.
            if (is_array($value) && $value !== [] && array_is_list($value) && (string) $name === Str::singular($parentName)) {
                foreach ($value as $item) {
                    self::appendValue($document, $parent, (string) $name, $item);
                }

                continue;
            }

            self::appendValue($document, $parent, (string) $name, $value);
        }
    }

    private static function appendValue(DOMDocument $document, DOMElement $parent, string $name, mixed $value): void
    {
        $element = $document->createElement(self::name($name));
        $parent->appendChild($element);

        if (is_array($value)) {
            self::append($document, $element, $value, $name);

            return;
        }

        $text = match (true) {
            $value === null => '',
            is_bool($value) => $value ? 'true' : 'false',
            $value instanceof BackedEnum => (string) $value->value,
            $value instanceof DateTimeInterface => $value->format('Y-m-d H:i:s'),
            $value instanceof Stringable, is_scalar($value) => (string) $value,
            default => throw new InvalidArgumentException('A '.get_debug_type($value).' cannot be written as XML.'),
        };

        if ($text !== '') {
            $element->appendChild($document->createTextNode($text));
        }
    }

    /**
     * An element name, refused when it isn't one XML allows rather than sent as something Jamf would misread.
     */
    private static function name(string $name): string
    {
        if (! preg_match('/^[A-Za-z_][A-Za-z0-9_.-]*$/', $name)) {
            throw new InvalidArgumentException('"'.$name.'" cannot be an XML element name.');
        }

        return $name;
    }
}
