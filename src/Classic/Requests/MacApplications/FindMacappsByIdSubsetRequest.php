<?php

namespace spkm\Jamf\Classic\Requests\MacApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a mac application: GET /macapplications/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a mac application specified with the {id} parameter.
 * Lookup by name is also supported. For example, /macapplications/id/3/subset/General&Scope or
 * /macapplications/id/3/subset/General.
 */
class FindMacappsByIdSubsetRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $subset, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/macapplications/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
