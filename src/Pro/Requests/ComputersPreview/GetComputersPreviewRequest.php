<?php

namespace spkm\Jamf\Pro\Requests\ComputersPreview;

use spkm\Jamf\Pro\Data\ComputerOverview;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Return a list of Computers: GET /preview/computers.
 *
 * Returns a list of computers.
 */
class GetComputersPreviewRequest extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = ComputerOverview::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/preview/computers';
    }
}
