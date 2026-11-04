<?php

namespace spkm\Jamf\Classic\Requests\AdvancedComputerSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer searches by name: GET /advancedcomputersearches/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindComputerSearchesByNameRequest extends ClassicGetRequest
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
        return '/advancedcomputersearches/name/'.Path::segment((string) $this->name);
    }
}
