<?php

namespace spkm\Jamf\Pro\Requests\JamfConnect;

use spkm\Jamf\Pro\Data\LinkedConnectProfile;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Search for config profiles linked to Jamf Connect: GET /v1/jamf-connect/config-profiles.
 */
class GetJamfConnectConfigProfilesV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = LinkedConnectProfile::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-connect/config-profiles';
    }
}
