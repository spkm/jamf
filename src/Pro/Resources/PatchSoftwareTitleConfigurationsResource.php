<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\PatchReportV3;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfiguration;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfigurationDependency;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleDefinition;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleExtensionAttributes;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleReport;
use spkm\Jamf\Pro\Data\PatchSummary;
use spkm\Jamf\Pro\Data\PatchSummaryVersion;
use spkm\Jamf\Pro\Data\SoftwareTitleConfigurationOnDashboard;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationDashboardV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationHistoryV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationHistoryV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationsV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationDashboardV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDashboardV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDefinitionsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDefinitionsV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDependenciesV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDependenciesV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExportReportV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExportReportV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExtensionAttributesV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExtensionAttributesV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationHistoryV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationHistoryV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchReportV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchReportV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationsV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\UpdatePatchSoftwareTitleConfigurationV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\UpdatePatchSoftwareTitleConfigurationV3Request;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Resources\PagedResource;

/**
 * The patch-software-title-configurations endpoints of the Jamf Pro API, from Jamf::patchSoftwareTitleConfigurations().
 *
 * @extends BaseResource<Data>
 */
class PatchSoftwareTitleConfigurationsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Add a software title configuration to the dashboard: POST
     * /v2/patch-software-title-configurations/{id}/dashboard.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPatchSoftwareTitleConfigurationDashboardV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new CreatePatchSoftwareTitleConfigurationDashboardV2Request($id, $options));
    }

    /**
     * Add a software title configuration to the dashboard: POST
     * /v3/patch-software-title-configurations/{id}/dashboard.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPatchSoftwareTitleConfigurationDashboardV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new CreatePatchSoftwareTitleConfigurationDashboardV3Request($id, $options));
    }

    /**
     * Add Patch Software Title Configuration history object notes: POST
     * /v2/patch-software-title-configurations/{id}/history.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPatchSoftwareTitleConfigurationHistoryV2(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreatePatchSoftwareTitleConfigurationHistoryV2Request($id, $body, $options));
    }

    /**
     * Add Patch Software Title Configuration history object notes: POST
     * /v3/patch-software-title-configurations/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPatchSoftwareTitleConfigurationHistoryV3(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreatePatchSoftwareTitleConfigurationHistoryV3Request($id, $body, $options));
    }

    /**
     * Create Patch Software Title Configurations: POST /v2/patch-software-title-configurations.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPatchSoftwareTitleConfigurationsV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreatePatchSoftwareTitleConfigurationsV2Request($body, $options));
    }

    /**
     * Create Patch Software Title Configurations: POST /v3/patch-software-title-configurations.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPatchSoftwareTitleConfigurationsV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreatePatchSoftwareTitleConfigurationsV3Request($body, $options));
    }

    /**
     * Remove a software title configuration from the dashboard: DELETE
     * /v2/patch-software-title-configurations/{id}/dashboard.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePatchSoftwareTitleConfigurationDashboardV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePatchSoftwareTitleConfigurationDashboardV2Request($id, $options));
    }

    /**
     * Remove a software title configuration from the dashboard: DELETE
     * /v3/patch-software-title-configurations/{id}/dashboard.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePatchSoftwareTitleConfigurationDashboardV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePatchSoftwareTitleConfigurationDashboardV3Request($id, $options));
    }

    /**
     * Delete Patch Software Title Configurations with the supplied id: DELETE
     * /v2/patch-software-title-configurations/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePatchSoftwareTitleConfigurationV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePatchSoftwareTitleConfigurationV2Request($id, $options));
    }

    /**
     * Delete Patch Software Title Configurations with the supplied id: DELETE
     * /v3/patch-software-title-configurations/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePatchSoftwareTitleConfigurationV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePatchSoftwareTitleConfigurationV3Request($id, $options));
    }

    /**
     * Return whether or not the requested software title configuration is on the dashboard: GET
     * /v2/patch-software-title-configurations/{id}/dashboard.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchSoftwareTitleConfigurationDashboardV2(int|string $id, array $options = []): ?SoftwareTitleConfigurationOnDashboard
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationDashboardV2Request($id, $options));
    }

    /**
     * Return whether or not the requested software title configuration is on the dashboard: GET
     * /v3/patch-software-title-configurations/{id}/dashboard.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchSoftwareTitleConfigurationDashboardV3(int|string $id, array $options = []): ?SoftwareTitleConfigurationOnDashboard
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationDashboardV3Request($id, $options));
    }

    /**
     * Retrieve Patch Software Title Definitions with the supplied id: GET
     * /v2/patch-software-title-configurations/{id}/definitions.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @return PagedResource<PatchSoftwareTitleDefinition>
     */
    public function getPatchSoftwareTitleConfigurationDefinitionsV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), PatchSoftwareTitleDefinition::class, fn (Query $query) => new GetPatchSoftwareTitleConfigurationDefinitionsV2Request($id, $query));
    }

    /**
     * Retrieve Patch Software Title Definitions with the supplied id: GET
     * /v3/patch-software-title-configurations/{id}/definitions.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<PatchSoftwareTitleDefinition>
     */
    public function getPatchSoftwareTitleConfigurationDefinitionsV3(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), PatchSoftwareTitleDefinition::class, fn (Query $query) => new GetPatchSoftwareTitleConfigurationDefinitionsV3Request($id, $query));
    }

    /**
     * Retrieve list of Patch Software Title Configuration Dependencies: GET
     * /v2/patch-software-title-configurations/{id}/dependencies.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchSoftwareTitleConfigurationDependency>
     */
    public function getPatchSoftwareTitleConfigurationDependenciesV2(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationDependenciesV2Request($id, $options));
    }

    /**
     * Retrieve list of Patch Software Title Configuration Dependencies: GET
     * /v3/patch-software-title-configurations/{id}/dependencies.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchSoftwareTitleConfigurationDependency>
     */
    public function getPatchSoftwareTitleConfigurationDependenciesV3(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationDependenciesV3Request($id, $options));
    }

    /**
     * Export Patch Reporting Data: GET /v2/patch-software-title-configurations/{id}/export-report.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: filter, columns-to-export (required).
     */
    public function getPatchSoftwareTitleConfigurationExportReportV2(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationExportReportV2Request($id, $options));
    }

    /**
     * Export Patch Reporting Data: GET /v3/patch-software-title-configurations/{id}/export-report.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: filter, columns-to-export (required).
     */
    public function getPatchSoftwareTitleConfigurationExportReportV3(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationExportReportV3Request($id, $options));
    }

    /**
     * Retrieve Software Title Extension Attributes with the supplied id: GET
     * /v2/patch-software-title-configurations/{id}/extension-attributes.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchSoftwareTitleExtensionAttributes>
     */
    public function getPatchSoftwareTitleConfigurationExtensionAttributesV2(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationExtensionAttributesV2Request($id, $options));
    }

    /**
     * Retrieve Software Title Extension Attributes with the supplied id: GET
     * /v3/patch-software-title-configurations/{id}/extension-attributes.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchSoftwareTitleExtensionAttributes>
     */
    public function getPatchSoftwareTitleConfigurationExtensionAttributesV3(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationExtensionAttributesV3Request($id, $options));
    }

    /**
     * Get specified Patch Software Title Configuration history object: GET
     * /v2/patch-software-title-configurations/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getPatchSoftwareTitleConfigurationHistoryV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetPatchSoftwareTitleConfigurationHistoryV2Request($id, $query));
    }

    /**
     * Get specified Patch Software Title Configuration history object: GET
     * /v3/patch-software-title-configurations/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getPatchSoftwareTitleConfigurationHistoryV3(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetPatchSoftwareTitleConfigurationHistoryV3Request($id, $query));
    }

    /**
     * Retrieve Patch Software Title Configuration Patch Report: GET
     * /v2/patch-software-title-configurations/{id}/patch-report.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @return PagedResource<PatchSoftwareTitleReport>
     */
    public function getPatchSoftwareTitleConfigurationPatchReportV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), PatchSoftwareTitleReport::class, fn (Query $query) => new GetPatchSoftwareTitleConfigurationPatchReportV2Request($id, $query));
    }

    /**
     * Retrieve Patch Software Title Configuration Patch Report: GET
     * /v3/patch-software-title-configurations/{id}/patch-report.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<PatchReportV3>
     */
    public function getPatchSoftwareTitleConfigurationPatchReportV3(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), PatchReportV3::class, fn (Query $query) => new GetPatchSoftwareTitleConfigurationPatchReportV3Request($id, $query));
    }

    /**
     * Return Active Patch Summary: GET /v2/patch-software-title-configurations/{id}/patch-summary.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchSoftwareTitleConfigurationPatchSummaryV2(int|string $id, array $options = []): ?PatchSummary
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationPatchSummaryV2Request($id, $options));
    }

    /**
     * Return Active Patch Summary: GET /v3/patch-software-title-configurations/{id}/patch-summary.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchSoftwareTitleConfigurationPatchSummaryV3(int|string $id, array $options = []): ?PatchSummary
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationPatchSummaryV3Request($id, $options));
    }

    /**
     * Returns patch versions: GET /v2/patch-software-title-configurations/{id}/patch-summary/versions.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchSummaryVersion>
     */
    public function getPatchSoftwareTitleConfigurationPatchSummaryVersionsV2(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV2Request($id, $options));
    }

    /**
     * Returns patch versions: GET /v3/patch-software-title-configurations/{id}/patch-summary/versions.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchSummaryVersion>
     */
    public function getPatchSoftwareTitleConfigurationPatchSummaryVersionsV3(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV3Request($id, $options));
    }

    /**
     * Retrieve Patch Software Title Configurations with the supplied id: GET
     * /v2/patch-software-title-configurations/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchSoftwareTitleConfigurationV2(int|string $id, array $options = []): ?PatchSoftwareTitleConfiguration
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationV2Request($id, $options));
    }

    /**
     * Retrieve Patch Software Title Configurations with the supplied id: GET
     * /v3/patch-software-title-configurations/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchSoftwareTitleConfigurationV3(int|string $id, array $options = []): ?PatchSoftwareTitleConfiguration
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationV3Request($id, $options));
    }

    /**
     * Retrieve Patch Software Title Configurations: GET /v2/patch-software-title-configurations.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchSoftwareTitleConfiguration>
     */
    public function getPatchSoftwareTitleConfigurationsV2(array $options = []): Collection
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationsV2Request($options));
    }

    /**
     * Retrieve Patch Software Title Configurations: GET /v3/patch-software-title-configurations.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchSoftwareTitleConfiguration>
     */
    public function getPatchSoftwareTitleConfigurationsV3(array $options = []): Collection
    {
        return $this->fetch(new GetPatchSoftwareTitleConfigurationsV3Request($options));
    }

    /**
     * Update Patch Software Title Configurations: PATCH /v2/patch-software-title-configurations/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updatePatchSoftwareTitleConfigurationV2(int|string $id, array|JsonSerializable $body, array $options = []): ?PatchSoftwareTitleConfiguration
    {
        return $this->fetch(new UpdatePatchSoftwareTitleConfigurationV2Request($id, $body, $options));
    }

    /**
     * Update Patch Software Title Configurations: PATCH /v3/patch-software-title-configurations/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updatePatchSoftwareTitleConfigurationV3(int|string $id, array|JsonSerializable $body, array $options = []): ?PatchSoftwareTitleConfiguration
    {
        return $this->fetch(new UpdatePatchSoftwareTitleConfigurationV3Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
