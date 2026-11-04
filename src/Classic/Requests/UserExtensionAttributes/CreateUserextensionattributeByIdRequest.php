<?php

namespace spkm\Jamf\Classic\Requests\UserExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new user extension attribute by id: POST /userextensionattributes/id/{id}.
 */
class CreateUserextensionattributeByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'user_extension_attribute';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <user_extension_attribute>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/userextensionattributes/id/'.Path::segment((string) $this->id);
    }
}
