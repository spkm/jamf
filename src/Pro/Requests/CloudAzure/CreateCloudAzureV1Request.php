<?php

namespace spkm\Jamf\Pro\Requests\CloudAzure;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create Azure Cloud Identity Provider configuration: POST /v1/cloud-azure.
 *
 * Create new Azure Cloud Identity Provider configuration with unique display name.
 */
class CreateCloudAzureV1Request extends WriteRequest
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
        return '/v1/cloud-azure';
    }
}
