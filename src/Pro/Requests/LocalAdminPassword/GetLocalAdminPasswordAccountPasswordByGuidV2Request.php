<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use spkm\Jamf\Pro\Data\LapsPasswordResponseV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get current LAPS password for specified user guid on a client: GET /v2/local-admin-password/{clientManagementId}/account/{username}/{guid}/password.
 *
 * Get current LAPS password for specified client by using the client management id, username, and user guid as the
 * path parameters. Once the password is viewed it will be rotated out with a new password based on the rotation time
 * settings.
 */
class GetLocalAdminPasswordAccountPasswordByGuidV2Request extends GetRequest
{
    protected ?string $dto = LapsPasswordResponseV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, protected string $username, protected string $guid, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/'.Path::segment((string) $this->clientManagementId).'/account/'.Path::segment((string) $this->username).'/'.Path::segment((string) $this->guid).'/password';
    }
}
