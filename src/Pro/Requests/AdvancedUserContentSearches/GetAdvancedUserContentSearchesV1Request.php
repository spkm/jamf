<?php

namespace spkm\Jamf\Pro\Requests\AdvancedUserContentSearches;

use spkm\Jamf\Pro\Data\AdvancedUserContentSearch;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get All Advanced User Content Search objects: GET /v1/advanced-user-content-searches.
 *
 * Get All Advanced User Content Search Objects
 */
class GetAdvancedUserContentSearchesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = AdvancedUserContentSearch::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/advanced-user-content-searches';
    }
}
