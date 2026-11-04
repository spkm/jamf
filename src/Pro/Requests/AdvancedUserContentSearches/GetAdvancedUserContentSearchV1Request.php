<?php

namespace spkm\Jamf\Pro\Requests\AdvancedUserContentSearches;

use spkm\Jamf\Pro\Data\AdvancedUserContentSearch;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Specified Advanced User Content Search object: GET /v1/advanced-user-content-searches/{id}.
 *
 * Gets Specified Advanced User Content Search Object
 */
class GetAdvancedUserContentSearchV1Request extends GetRequest
{
    protected ?string $dto = AdvancedUserContentSearch::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/advanced-user-content-searches/'.Path::segment((string) $this->id);
    }
}
