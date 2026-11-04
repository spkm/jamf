<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use spkm\Jamf\Pro\Data\CloudLdapConnectionStatus;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Tests the communication with the specified cloud connection: GET /v2/cloud-ldaps/{id}/connection/status.
 */
class GetCloudLdapConnectionStatusV2Request extends GetRequest
{
    protected ?string $dto = CloudLdapConnectionStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/cloud-ldaps/'.Path::segment((string) $this->id).'/connection/status';
    }
}
