<?php

namespace spkm\Jamf\Pro\Requests\Dashboard;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Add or remove an object to the Jamf Pro dashboard: POST /v1/dashboard/toggle.
 *
 * Add or remove dashboard detail by the type of object, and the object's ID. Duplicates will not be added again.
 */
class ToggleDashboardV1Request extends WriteRequest
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
        return '/v1/dashboard/toggle';
    }
}
