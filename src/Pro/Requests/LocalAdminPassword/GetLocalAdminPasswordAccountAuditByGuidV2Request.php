<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use spkm\Jamf\Pro\Data\LapsPasswordAndAuditsV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get LAPS password viewed history: GET /v2/local-admin-password/{clientManagementId}/account/{username}/{guid}/audit.
 *
 * Get the full history of all local admin passwords for a specific user guid on a target device. History will include
 * password, who viewed the password and when it was viewed. Get audit history by using the client management id,
 * username, and user guid as the path parameters.
 */
class GetLocalAdminPasswordAccountAuditByGuidV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LapsPasswordAndAuditsV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, protected string $username, protected string $guid, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/'.Path::segment((string) $this->clientManagementId).'/account/'.Path::segment((string) $this->username).'/'.Path::segment((string) $this->guid).'/audit';
    }
}
