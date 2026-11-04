<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Computer Extension Attribute: DELETE /v1/computer-extension-attributes/{id}.
 *
 * ID of the Computer Extension Attribute to be deleted.
 */
class DeleteComputerExtensionAttributeV1Request extends DeleteRequest
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
        return '/v1/computer-extension-attributes/'.Path::segment((string) $this->id);
    }
}
