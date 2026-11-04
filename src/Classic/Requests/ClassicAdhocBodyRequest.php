<?php

namespace spkm\Jamf\Classic\Requests;

use InvalidArgumentException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasXmlBody;
use spkm\Jamf\Support\Xml;

/**
 * An ad-hoc Classic API POST or PUT carrying a record as XML: the XML itself, or an array under the one key that
 * names the record's kind (['building' => ['name' => 'Library']]), or an array with $root saying the kind.
 */
class ClassicAdhocBodyRequest extends ClassicAdhocRequest implements HasBody
{
    use HasXmlBody;

    /**
     * @param  array<string, mixed>|string  $record
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(Method $method, string $path, protected array|string $record = [], array $parameters = [], string $shape = self::RAW, protected ?string $root = null)
    {
        parent::__construct($method, $path, $parameters, $shape);
    }

    protected function defaultBody(): ?string
    {
        if (is_string($this->record)) {
            return $this->record;
        }

        if ($this->record === []) {
            return null;
        }

        if ($this->root !== null) {
            return Xml::fromArray($this->root, $this->record);
        }

        $kind = array_key_first($this->record);

        if (count($this->record) !== 1 || ! is_array($this->record[$kind])) {
            throw new InvalidArgumentException('A Classic API record goes under the one key that names its kind, such as [\'building\' => [\'name\' => \'Library\']].');
        }

        return Xml::fromArray($kind, $this->record[$kind]);
    }
}
