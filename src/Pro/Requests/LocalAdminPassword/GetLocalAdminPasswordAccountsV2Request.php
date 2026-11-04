<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use spkm\Jamf\Pro\Data\LapsUserV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get the LAPS capable admin accounts for a device: GET /v2/local-admin-password/{clientManagementId}/accounts.
 *
 * Get a full list of admin accounts that are LAPS capable. Capable accounts are returned in the
 * AutoSetupAdminAccounts from QueryResponses.
 */
class GetLocalAdminPasswordAccountsV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LapsUserV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/'.Path::segment((string) $this->clientManagementId).'/accounts';
    }
}
