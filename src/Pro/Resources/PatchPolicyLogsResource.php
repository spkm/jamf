<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\PatchPolicyLogDetail;
use spkm\Jamf\Pro\Data\PatchPolicyLogEligibleRetryCount;
use spkm\Jamf\Pro\Data\PatchPolicyLogV2;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\GetPatchPolicyLogDetailsV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\GetPatchPolicyLogsEligibleRetryCountV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\GetPatchPolicyLogsV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\GetPatchPolicyLogV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\RetryPatchPolicyLogsAllV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\RetryPatchPolicyLogsV2Request;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Resources\PagedResource;

/**
 * The patch-policy-logs endpoints of the Jamf Pro API, from Jamf::patchPolicyLogs().
 *
 * @extends BaseResource<Data>
 */
class PatchPolicyLogsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Return attempt details for a specific log: GET /v2/patch-policies/{id}/logs/{deviceId}/details.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PatchPolicyLogDetail>
     */
    public function getPatchPolicyLogDetailsV2(int|string $id, int|string $deviceId, array $options = []): Collection
    {
        return $this->fetch(new GetPatchPolicyLogDetailsV2Request($id, $deviceId, $options));
    }

    /**
     * Retrieves a single Patch Policy Log: GET /v2/patch-policies/{id}/logs/{deviceId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchPolicyLogV2(int|string $id, int|string $deviceId, array $options = []): ?PatchPolicyLogV2
    {
        return $this->fetch(new GetPatchPolicyLogV2Request($id, $deviceId, $options));
    }

    /**
     * Return the count of the Patch Policy Logs for the patch policy id that are eligible for a retry attempt: GET
     * /v2/patch-policies/{id}/logs/eligible-retry-count.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchPolicyLogsEligibleRetryCountV2(int|string $id, array $options = []): ?PatchPolicyLogEligibleRetryCount
    {
        return $this->fetch(new GetPatchPolicyLogsEligibleRetryCountV2Request($id, $options));
    }

    /**
     * Retrieve Patch Policy Logs: GET /v2/patch-policies/{id}/logs.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<PatchPolicyLogV2>
     */
    public function getPatchPolicyLogsV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), PatchPolicyLogV2::class, fn (Query $query) => new GetPatchPolicyLogsV2Request($id, $query));
    }

    /**
     * Send retry attempts for all devices: POST /v2/patch-policies/{id}/logs/retry-all.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function retryPatchPolicyLogsAllV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new RetryPatchPolicyLogsAllV2Request($id, $options));
    }

    /**
     * Send retry attempts for specific devices: POST /v2/patch-policies/{id}/logs/retry.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function retryPatchPolicyLogsV2(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new RetryPatchPolicyLogsV2Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
