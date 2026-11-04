<?php

namespace spkm\Jamf\Pro\Requests\CloudIdp;

use spkm\Jamf\Pro\Data\CloudIdPCommonResponse;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get information about all Cloud Identity Providers configurations: GET /v1/cloud-idp.
 *
 * Returns basic informations about all configured Cloud Identity Provider.
 */
class GetCloudIdpV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = CloudIdPCommonResponse::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-idp';
    }
}
