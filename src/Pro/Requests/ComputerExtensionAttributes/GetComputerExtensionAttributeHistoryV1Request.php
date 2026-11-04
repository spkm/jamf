<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Computer Extension Attribute History object: GET /v1/computer-extension-attributes/{id}/history.
 *
 * Get specified Computer Extension Attribute history object
 */
class GetComputerExtensionAttributeHistoryV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ObjectHistory::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-extension-attributes/'.Path::segment((string) $this->id).'/history';
    }
}
