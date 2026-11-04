<?php

namespace spkm\Jamf\Classic\Requests\UserExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a user extension attribute by id: DELETE /userextensionattributes/id/{id}.
 */
class DeleteUserextensionattributeByIdRequest extends ClassicDeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/userextensionattributes/id/'.Path::segment((string) $this->id);
    }
}
