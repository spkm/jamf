<?php

namespace spkm\Jamf\Classic\Requests;

use InvalidArgumentException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasXmlBody;
use spkm\Jamf\Support\Xml;

/**
 * A Classic API POST or PUT carrying a record as XML: an array of Jamf's field names, written under the element
 * that names the record's kind (mobile_device, building, ...), or the XML itself. Jamf answers with the record's
 * id, as ['id' => '42'].
 */
abstract class ClassicWriteRequest extends ClassicRequest implements HasBody
{
    use HasXmlBody;

    protected Method $method = Method::POST;

    protected string $responseShape = self::ONE;

    protected bool $safe = false;

    /**
     * The element a record is written under.
     */
    protected string $root = '';

    /** @var array<string, mixed>|string */
    protected array|string $record = [];

    /** @var array<string, mixed> */
    protected array $options = [];

    protected function defaultBody(): ?string
    {
        if (is_string($this->record)) {
            return $this->record;
        }

        if ($this->record === []) {
            return null;
        }

        if ($this->root === '') {
            throw new InvalidArgumentException(class_basename($this).' takes its record as XML.');
        }

        return Xml::fromArray($this->root, $this->record);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }

    /**
     * The element the record is written under.
     */
    public function root(): string
    {
        return $this->root;
    }
}
