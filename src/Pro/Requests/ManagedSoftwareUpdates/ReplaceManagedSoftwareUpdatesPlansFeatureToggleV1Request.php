<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanToggle;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Updates Feature Toggle Value: PUT /v1/managed-software-updates/plans/feature-toggle.
 *
 * Updates the value of the Feature Toggle - This endpoint is asynchronous, the provided value will not be immediately
 * updated. Please use the following endpoint to track the status of your toggle request.
 * /v1/managed-software-updates/plans/feature-toggle/status:
 */
class ReplaceManagedSoftwareUpdatesPlansFeatureToggleV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ManagedSoftwareUpdatePlanToggle::class;

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
        return '/v1/managed-software-updates/plans/feature-toggle';
    }
}
