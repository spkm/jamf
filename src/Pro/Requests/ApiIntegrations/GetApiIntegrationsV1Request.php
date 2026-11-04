<?php

namespace spkm\Jamf\Pro\Requests\ApiIntegrations;

use spkm\Jamf\Pro\Data\ApiIntegrationResponse;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get the current API Integrations: GET /v1/api-integrations.
 *
 * Get Jamf|Pro API Integrations with Search Criteria
 */
class GetApiIntegrationsV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ApiIntegrationResponse::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/api-integrations';
    }
}
