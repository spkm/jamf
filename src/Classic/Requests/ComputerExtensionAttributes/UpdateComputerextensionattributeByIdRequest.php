<?php

namespace spkm\Jamf\Classic\Requests\ComputerExtensionAttributes;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing computer extension attribute by id: PUT /computerextensionattributes/id/{id}.
 */
class UpdateComputerextensionattributeByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'computer_extension_attribute';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer_extension_attribute>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computerextensionattributes/id/'.Path::segment((string) $this->id);
    }
}
