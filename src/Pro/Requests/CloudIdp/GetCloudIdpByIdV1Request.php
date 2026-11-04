<?php

namespace spkm\Jamf\Pro\Requests\CloudIdp;

use spkm\Jamf\Pro\Data\CloudIdPCommon;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Cloud Identity Provider configuration with given ID: GET /v1/cloud-idp/{id}.
 */
class GetCloudIdpByIdV1Request extends GetRequest
{
    protected ?string $dto = CloudIdPCommon::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-idp/'.Path::segment((string) $this->id);
    }
}
