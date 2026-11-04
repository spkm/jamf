<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanPostResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create a Managed Software Update Plan: POST /v1/managed-software-updates/plans.
 *
 * Creates a Managed Software Update Plan.
 */
class CreateManagedSoftwareUpdatesPlansV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = ManagedSoftwareUpdatePlanPostResponse::class;

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
        return '/v1/managed-software-updates/plans';
    }
}
