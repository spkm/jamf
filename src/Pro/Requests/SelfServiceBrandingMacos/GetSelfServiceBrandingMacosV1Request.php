<?php

namespace spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos;

use spkm\Jamf\Pro\Data\MacOsBrandingConfiguration;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Search for sorted and paged macOS branding configurations: GET /v1/self-service/branding/macos.
 */
class GetSelfServiceBrandingMacosV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = MacOsBrandingConfiguration::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/self-service/branding/macos';
    }
}
