<?php

namespace spkm\Jamf\Pro\Requests\JamfPackage;

use spkm\Jamf\Pro\Data\JamfPackageResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the packages for a given Jamf application: GET /v1/jamf-package.
 */
class GetJamfPackageV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = JamfPackageResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: application (required).
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-package';
    }
}
