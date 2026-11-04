<?php

namespace spkm\Jamf\Classic\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a computer extension attribute by id: DELETE /computerextensionattributes/id/{id}.
 */
class DeleteComputerextensionattributeByIdRequest extends ClassicDeleteRequest
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
        return '/computerextensionattributes/id/'.Path::segment((string) $this->id);
    }
}
