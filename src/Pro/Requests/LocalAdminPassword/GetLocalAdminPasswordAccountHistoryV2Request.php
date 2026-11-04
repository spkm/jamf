<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use spkm\Jamf\Pro\Data\LapsHistory;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get LAPS historical records for target device and username: GET /v2/local-admin-password/{clientManagementId}/account/{username}/history.
 *
 * Get the full history of all for a specific username on a target device. History will include date created, date
 * last seen, expiration time, and rotational status. Get audit history by using the client management id and username
 * as the path parameters.
 */
class GetLocalAdminPasswordAccountHistoryV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LapsHistory::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, protected string $username, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/'.Path::segment((string) $this->clientManagementId).'/account/'.Path::segment((string) $this->username).'/history';
    }
}
