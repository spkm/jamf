<?php

namespace spkm\Jamf\Pro\Requests\AdvancedUserContentSearches;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Advanced User Content Search object: DELETE /v1/advanced-user-content-searches/{id}.
 *
 * Removes specified Advanced User Content Search Object
 */
class DeleteAdvancedUserContentSearchV1Request extends DeleteRequest
{
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
