<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use spkm\Jamf\Pro\Data\LapsAccountManagementHistory;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get LAPS password viewed history, and rotation history: GET /v2/local-admin-password/{clientManagementId}/history.
 *
 * Get the full history of all local admin passwords for all accounts for a specific management ID. History will
 * include password, who viewed the password and when it was viewed. This will include rotation history as well.
 */
class GetLocalAdminPasswordHistoryV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LapsAccountManagementHistory::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/'.Path::segment((string) $this->clientManagementId).'/history';
    }
}
