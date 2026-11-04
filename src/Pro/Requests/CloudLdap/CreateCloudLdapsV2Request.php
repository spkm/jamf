<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create Cloud Identity Provider configuration: POST /v2/cloud-ldaps.
 *
 * Create new Cloud Identity Provider configuration with unique display name. If mappings not provided, then defaults
 * will be generated instead.
 */
class CreateCloudLdapsV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

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
        return '/v2/cloud-ldaps';
    }
}
