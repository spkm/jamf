<?php

namespace spkm\Jamf\Pro\Requests\Packages;

use spkm\Jamf\Pro\Data\Package;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Package object: GET /v1/packages/{id}.
 *
 * Gets specified Package object
 */
class GetPackageV1Request extends GetRequest
{
    protected ?string $dto = Package::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/packages/'.Path::segment((string) $this->id);
    }
}
