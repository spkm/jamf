<?php

namespace spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Remove specified Advanced Search objects: POST /v1/advanced-mobile-device-searches/delete-multiple.
 *
 * Removes specified Advanced Search Objects
 */
class DeleteMultipleAdvancedMobileDeviceSearchesV1Request extends WriteRequest
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
        return '/v1/advanced-mobile-device-searches/delete-multiple';
    }
}
