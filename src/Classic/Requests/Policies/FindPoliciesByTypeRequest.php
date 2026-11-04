<?php

namespace spkm\Jamf\Classic\Requests\Policies;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds all policies by type: GET /policies/createdBy/{createdBy}.
 *
 * Type may be specified by Jamf Pro.
 */
class FindPoliciesByTypeRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $createdBy, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policies/createdBy/'.Path::segment((string) $this->createdBy);
    }
}
