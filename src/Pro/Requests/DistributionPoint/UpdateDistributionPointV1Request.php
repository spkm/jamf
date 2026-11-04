<?php

namespace spkm\Jamf\Pro\Requests\DistributionPoint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\DistributionPoint;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update specified distribution point object: PATCH /v1/distribution-points/{id}.
 *
 * Updates the specified object configuration of a File Share Distribution Point in Jamf Pro. ID path parameter is
 * mandatory and other fields can be updated as a whole or with minimal object.
 */
class UpdateDistributionPointV1Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::ONE;

    protected ?string $dto = DistributionPoint::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/distribution-points/'.Path::segment((string) $this->id);
    }
}
