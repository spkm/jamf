<?php

namespace spkm\Jamf\Classic\Requests\Policies;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a policy: GET /policies/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a policy specified with the {id} parameter. Lookup
 * by name is also supported. For example, /policies/id/3/subset/General&Location&Purchasing or
 * /policies/id/3/subset/Purchasing.
 */
class FindPoliciesByIdSubsetRequest extends ClassicGetRequest
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
        return '/policies/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
