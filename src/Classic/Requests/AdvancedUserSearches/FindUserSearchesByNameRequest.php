<?php

namespace spkm\Jamf\Classic\Requests\AdvancedUserSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds user searches by name: GET /advancedusersearches/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindUserSearchesByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/advancedusersearches/name/'.Path::segment((string) $this->name);
    }
}
