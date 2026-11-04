<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Delete multiple Computer Extension Attribute at once: POST /v1/computer-extension-attributes/delete-multiple.
 *
 * IDs of the Computer Extension Attribute to be deleted.
 */
class DeleteMultipleComputerExtensionAttributesV1Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-extension-attributes/delete-multiple';
    }
}
