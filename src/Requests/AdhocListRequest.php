<?php

namespace spkm\Jamf\Requests;

use spkm\Jamf\Query\Query;
use spkm\Jamf\Support\Path;

/**
 * A list request for a collection the package has no request for, as Jamf::from('/v1/path'); its records are
 * arrays, and it is taken to filter and sort as Jamf's newer collections do.
 */
class AdhocListRequest extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected bool $sectioned = true;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $path, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return Path::path($this->path);
    }
}
