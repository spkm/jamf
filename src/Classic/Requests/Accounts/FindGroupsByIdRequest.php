<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds groups by id: GET /accounts/groupid/{id}.
 */
class FindGroupsByIdRequest extends ClassicGetRequest
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
        return '/accounts/groupid/'.Path::segment((string) $this->id);
    }
}
