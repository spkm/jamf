<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\LapsAccountManagementHistory;
use spkm\Jamf\Pro\Data\LapsHistory;
use spkm\Jamf\Pro\Data\LapsPasswordAndAuditsV2;
use spkm\Jamf\Pro\Data\LapsPasswordResponseV2;
use spkm\Jamf\Pro\Data\LapsPendingRotation;
use spkm\Jamf\Pro\Data\LapsSettingsResponseV2;
use spkm\Jamf\Pro\Data\LapsUserPasswordResponseV2;
use spkm\Jamf\Pro\Data\LapsUserV2;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountAuditByGuidV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountAuditV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountHistoryByGuidV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountHistoryV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountPasswordByGuidV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountPasswordV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountsV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordHistoryV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordPendingRotationsV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordSettingsV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\ReplaceLocalAdminPasswordSetPasswordV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\ReplaceLocalAdminPasswordSettingsV2Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The local-admin-password endpoints of the Jamf Pro API, from Jamf::localAdminPassword().
 *
 * @extends BaseResource<Data>
 */
class LocalAdminPasswordResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get LAPS password viewed history: GET
     * /v2/local-admin-password/{clientManagementId}/account/{username}/{guid}/audit.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LapsPasswordAndAuditsV2>
     */
    public function getLocalAdminPasswordAccountAuditByGuidV2(int|string $clientManagementId, string $username, string $guid, array $options = []): Collection
    {
        return $this->fetch(new GetLocalAdminPasswordAccountAuditByGuidV2Request($clientManagementId, $username, $guid, $options));
    }

    /**
     * Get LAPS password viewed history: GET /v2/local-admin-password/{clientManagementId}/account/{username}/audit.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LapsPasswordAndAuditsV2>
     */
    public function getLocalAdminPasswordAccountAuditV2(int|string $clientManagementId, string $username, array $options = []): Collection
    {
        return $this->fetch(new GetLocalAdminPasswordAccountAuditV2Request($clientManagementId, $username, $options));
    }

    /**
     * Get LAPS historical records for target device and user guid: GET
     * /v2/local-admin-password/{clientManagementId}/account/{username}/{guid}/history.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LapsHistory>
     */
    public function getLocalAdminPasswordAccountHistoryByGuidV2(int|string $clientManagementId, string $username, string $guid, array $options = []): Collection
    {
        return $this->fetch(new GetLocalAdminPasswordAccountHistoryByGuidV2Request($clientManagementId, $username, $guid, $options));
    }

    /**
     * Get LAPS historical records for target device and username: GET
     * /v2/local-admin-password/{clientManagementId}/account/{username}/history.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LapsHistory>
     */
    public function getLocalAdminPasswordAccountHistoryV2(int|string $clientManagementId, string $username, array $options = []): Collection
    {
        return $this->fetch(new GetLocalAdminPasswordAccountHistoryV2Request($clientManagementId, $username, $options));
    }

    /**
     * Get current LAPS password for specified user guid on a client: GET
     * /v2/local-admin-password/{clientManagementId}/account/{username}/{guid}/password.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getLocalAdminPasswordAccountPasswordByGuidV2(int|string $clientManagementId, string $username, string $guid, array $options = []): ?LapsPasswordResponseV2
    {
        return $this->fetch(new GetLocalAdminPasswordAccountPasswordByGuidV2Request($clientManagementId, $username, $guid, $options));
    }

    /**
     * Get current LAPS password for specified username on a client: GET
     * /v2/local-admin-password/{clientManagementId}/account/{username}/password.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getLocalAdminPasswordAccountPasswordV2(int|string $clientManagementId, string $username, array $options = []): ?LapsPasswordResponseV2
    {
        return $this->fetch(new GetLocalAdminPasswordAccountPasswordV2Request($clientManagementId, $username, $options));
    }

    /**
     * Get the LAPS capable admin accounts for a device: GET /v2/local-admin-password/{clientManagementId}/accounts.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LapsUserV2>
     */
    public function getLocalAdminPasswordAccountsV2(int|string $clientManagementId, array $options = []): Collection
    {
        return $this->fetch(new GetLocalAdminPasswordAccountsV2Request($clientManagementId, $options));
    }

    /**
     * Get LAPS password viewed history, and rotation history: GET
     * /v2/local-admin-password/{clientManagementId}/history.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LapsAccountManagementHistory>
     */
    public function getLocalAdminPasswordHistoryV2(int|string $clientManagementId, array $options = []): Collection
    {
        return $this->fetch(new GetLocalAdminPasswordHistoryV2Request($clientManagementId, $options));
    }

    /**
     * Get a list of the current devices and usernames with pending LAPS rotations: GET
     * /v2/local-admin-password/pending-rotations.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LapsPendingRotation>
     */
    public function getLocalAdminPasswordPendingRotationsV2(array $options = []): Collection
    {
        return $this->fetch(new GetLocalAdminPasswordPendingRotationsV2Request($options));
    }

    /**
     * Get the current LAPS settings: GET /v2/local-admin-password/settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getLocalAdminPasswordSettingsV2(array $options = []): ?LapsSettingsResponseV2
    {
        return $this->fetch(new GetLocalAdminPasswordSettingsV2Request($options));
    }

    /**
     * Set the LAPS password for a device: PUT /v2/local-admin-password/{clientManagementId}/set-password.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceLocalAdminPasswordSetPasswordV2(int|string $clientManagementId, array|JsonSerializable $body, array $options = []): ?LapsUserPasswordResponseV2
    {
        return $this->fetch(new ReplaceLocalAdminPasswordSetPasswordV2Request($clientManagementId, $body, $options));
    }

    /**
     * Update settings for LAPS: PUT /v2/local-admin-password/settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceLocalAdminPasswordSettingsV2(array|JsonSerializable $body, array $options = []): ?LapsSettingsResponseV2
    {
        return $this->fetch(new ReplaceLocalAdminPasswordSettingsV2Request($body, $options));
    }
}
