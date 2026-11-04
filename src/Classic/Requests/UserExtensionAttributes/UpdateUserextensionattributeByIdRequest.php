<?php

namespace spkm\Jamf\Classic\Requests\UserExtensionAttributes;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing user extension attribute by id: PUT /userextensionattributes/id/{id}.
 */
class UpdateUserextensionattributeByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
