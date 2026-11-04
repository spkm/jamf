<?php

namespace spkm\Jamf\Classic\Requests\AdvancedUserSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds user searches by id: GET /advancedusersearches/id/{id}.
 */
class FindAdvancedUserSearchesByIdRequest extends ClassicGetRequest
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
        return '/advancedusersearches/id/'.Path::segment((string) $this->id);
    }
}
