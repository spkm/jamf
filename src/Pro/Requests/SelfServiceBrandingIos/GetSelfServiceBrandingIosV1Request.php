<?php

namespace spkm\Jamf\Pro\Requests\SelfServiceBrandingIos;

use spkm\Jamf\Pro\Data\IosBrandingConfiguration;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Search for sorted and paged iOS branding configurations: GET /v1/self-service/branding/ios.
 */
class GetSelfServiceBrandingIosV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = IosBrandingConfiguration::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/self-service/branding/ios';
    }
}
