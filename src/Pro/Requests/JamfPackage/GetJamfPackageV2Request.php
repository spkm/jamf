<?php

namespace spkm\Jamf\Pro\Requests\JamfPackage;

use spkm\Jamf\Pro\Data\JamfApplicationResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the packages for a given Jamf application: GET /v2/jamf-package.
 */
class GetJamfPackageV2Request extends GetRequest
{
    protected ?string $dto = JamfApplicationResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: application (required).
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/jamf-package';
    }
}
