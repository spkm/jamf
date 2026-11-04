<?php

namespace spkm\Jamf\Classic\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new computer extension attribute by id: POST /computerextensionattributes/id/{id}.
 */
class CreateComputerextensionattributeByIdRequest extends ClassicWriteRequest
{
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
