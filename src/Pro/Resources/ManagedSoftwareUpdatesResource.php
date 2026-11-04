<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\AvailableOsUpdates;
use spkm\Jamf\Pro\Data\DssDeclarations;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlan;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanEventStore;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanPostResponse;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanToggle;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanToggleStatusWrapper;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdateStatus;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\AbandonManagedSoftwareUpdatesPlansFeatureToggleV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\CreateManagedSoftwareUpdatesPlansGroupV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\CreateManagedSoftwareUpdatesPlansV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesAvailableUpdatesV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanDeclarationsV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanEventsV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansFeatureToggleStatusV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansFeatureToggleV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansGroupV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesComputerGroupV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesComputerV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceGroupV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\ReplaceManagedSoftwareUpdatesPlansFeatureToggleV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The managed-software-updates endpoints of the Jamf Pro API, from Jamf::managedSoftwareUpdates().
 *
 * @extends Builder<ManagedSoftwareUpdatePlan>
 */
class ManagedSoftwareUpdatesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ManagedSoftwareUpdatePlan::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetManagedSoftwareUpdatesPlansV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetManagedSoftwareUpdatesPlanV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateManagedSoftwareUpdatesPlansV1Request($body);
    }

    /**
     * Force stops any ongoing or stalled feature-toggle processes: POST
     * /v1/managed-software-updates/plans/feature-toggle/abandon.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function abandonManagedSoftwareUpdatesPlansFeatureToggleV1(array $options = []): bool
    {
        return $this->perform(new AbandonManagedSoftwareUpdatesPlansFeatureToggleV1Request($options));
    }

    /**
     * Create Managed Software Update Plans for a Group: POST /v1/managed-software-updates/plans/group.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createManagedSoftwareUpdatesPlansGroupV1(array|JsonSerializable $body, array $options = []): ?ManagedSoftwareUpdatePlanPostResponse
    {
        return $this->fetch(new CreateManagedSoftwareUpdatesPlansGroupV1Request($body, $options));
    }

    /**
     * Create a Managed Software Update Plan: POST /v1/managed-software-updates/plans.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createManagedSoftwareUpdatesPlansV1(array|JsonSerializable $body, array $options = []): ?ManagedSoftwareUpdatePlanPostResponse
    {
        return $this->fetch(new CreateManagedSoftwareUpdatesPlansV1Request($body, $options));
    }

    /**
     * Retrieve available macOS and iOS Managed Software Updates: GET /v1/managed-software-updates/available-updates.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getManagedSoftwareUpdatesAvailableUpdatesV1(array $options = []): ?AvailableOsUpdates
    {
        return $this->fetch(new GetManagedSoftwareUpdatesAvailableUpdatesV1Request($options));
    }

    /**
     * Retrieve all Declarations associated with a Managed Software Update Plan: GET
     * /v1/managed-software-updates/plans/{id}/declarations.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getManagedSoftwareUpdatesPlanDeclarationsV1(int|string $id, array $options = []): ?DssDeclarations
    {
        return $this->fetch(new GetManagedSoftwareUpdatesPlanDeclarationsV1Request($id, $options));
    }

    /**
     * Retrieve a Managed Software Update Plan Event Store: GET /v1/managed-software-updates/plans/{id}/events.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getManagedSoftwareUpdatesPlanEventsV1(int|string $id, array $options = []): ?ManagedSoftwareUpdatePlanEventStore
    {
        return $this->fetch(new GetManagedSoftwareUpdatesPlanEventsV1Request($id, $options));
    }

    /**
     * Retrieve a Managed Software Update Plan: GET /v1/managed-software-updates/plans/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getManagedSoftwareUpdatesPlanV1(int|string $id, array $options = []): ?ManagedSoftwareUpdatePlan
    {
        return $this->fetch(new GetManagedSoftwareUpdatesPlanV1Request($id, $options));
    }

    /**
     * Retrieves background status of the Feature Toggle: GET
     * /v1/managed-software-updates/plans/feature-toggle/status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getManagedSoftwareUpdatesPlansFeatureToggleStatusV1(array $options = []): ?ManagedSoftwareUpdatePlanToggleStatusWrapper
    {
        return $this->fetch(new GetManagedSoftwareUpdatesPlansFeatureToggleStatusV1Request($options));
    }

    /**
     * Retrieve current value of the Feature Toggle: GET /v1/managed-software-updates/plans/feature-toggle.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getManagedSoftwareUpdatesPlansFeatureToggleV1(array $options = []): ?ManagedSoftwareUpdatePlanToggle
    {
        return $this->fetch(new GetManagedSoftwareUpdatesPlansFeatureToggleV1Request($options));
    }

    /**
     * Retrieve Managed Software Update Plans for a Group: GET /v1/managed-software-updates/plans/group/{id}.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: group-type (required).
     * @return Collection<int, ManagedSoftwareUpdatePlan>
     */
    public function getManagedSoftwareUpdatesPlansGroupV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetManagedSoftwareUpdatesPlansGroupV1Request($id, $options));
    }

    /**
     * Retrieve Managed Software Update Plans: GET /v1/managed-software-updates/plans.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ManagedSoftwareUpdatePlan>
     */
    public function getManagedSoftwareUpdatesPlansV1(): PagedResource
    {
        return new PagedResource($this->pro(), ManagedSoftwareUpdatePlan::class, fn (Query $query) => new GetManagedSoftwareUpdatesPlansV1Request($query));
    }

    /**
     * Retrieve Managed Software Update Statuses for Computer Groups: GET
     * /v1/managed-software-updates/update-statuses/computer-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, ManagedSoftwareUpdateStatus>
     */
    public function getManagedSoftwareUpdatesUpdateStatusesComputerGroupV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetManagedSoftwareUpdatesUpdateStatusesComputerGroupV1Request($id, $options));
    }

    /**
     * Retrieve Managed Software Update Statuses for Computers: GET
     * /v1/managed-software-updates/update-statuses/computers/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, ManagedSoftwareUpdateStatus>
     */
    public function getManagedSoftwareUpdatesUpdateStatusesComputerV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetManagedSoftwareUpdatesUpdateStatusesComputerV1Request($id, $options));
    }

    /**
     * Retrieve Managed Software Update Statuses for Mobile Device Groups: GET
     * /v1/managed-software-updates/update-statuses/mobile-device-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, ManagedSoftwareUpdateStatus>
     */
    public function getManagedSoftwareUpdatesUpdateStatusesMobileDeviceGroupV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceGroupV1Request($id, $options));
    }

    /**
     * Retrieve Managed Software Update Statuses for Mobile Devices: GET
     * /v1/managed-software-updates/update-statuses/mobile-devices/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, ManagedSoftwareUpdateStatus>
     */
    public function getManagedSoftwareUpdatesUpdateStatusesMobileDeviceV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceV1Request($id, $options));
    }

    /**
     * Retrieve Managed Software Update Statuses: GET /v1/managed-software-updates/update-statuses.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: filter.
     * @return Collection<int, ManagedSoftwareUpdateStatus>
     */
    public function getManagedSoftwareUpdatesUpdateStatusesV1(array $options = []): Collection
    {
        return $this->fetch(new GetManagedSoftwareUpdatesUpdateStatusesV1Request($options));
    }

    /**
     * Updates Feature Toggle Value: PUT /v1/managed-software-updates/plans/feature-toggle.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceManagedSoftwareUpdatesPlansFeatureToggleV1(array|JsonSerializable $body, array $options = []): ?ManagedSoftwareUpdatePlanToggle
    {
        return $this->fetch(new ReplaceManagedSoftwareUpdatesPlansFeatureToggleV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
