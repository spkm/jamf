<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\CloudDistributionPoint;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update specific fields on a cloud distribution point: PATCH /v1/cloud-distribution-point.
 */
class UpdateCloudDistributionPointV1Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
