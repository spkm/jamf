<?php

namespace spkm\Jamf\Pro\Requests\Sites;

use spkm\Jamf\Pro\Data\V1Site;
use spkm\Jamf\Requests\GetRequest;

/**
 * Find all sites: GET /v1/sites.
 */
class GetSitesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = V1Site::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/sites';
    }
}
