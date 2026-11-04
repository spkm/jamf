<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use JsonSerializable;
use spkm\Jamf\Pro\Data\CloudDistributionPoint;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create cloud distribution point: POST /v1/cloud-distribution-point.
 *
 * Creates cloud distribution point. This operation is triggered when the content delivery network (CDN) settings
 * change, specifically when the network type is updated from "None" to any other supported type. Upon successful
 * creation,the API returns the updated details of the cloud distribution point.
 */
class CreateCloudDistributionPointV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = CloudDistributionPoint::class;

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
        return '/v1/cloud-distribution-point';
    }
}
