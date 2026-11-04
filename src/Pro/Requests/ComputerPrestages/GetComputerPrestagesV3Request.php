<?php

namespace spkm\Jamf\Pro\Requests\ComputerPrestages;

use spkm\Jamf\Pro\Data\GetComputerPrestageV3;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get sorted and paged Computer Prestages: GET /v3/computer-prestages.
 *
 * Gets sorted and paged computer prestages
 */
class GetComputerPrestagesV3Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = GetComputerPrestageV3::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computer-prestages';
    }
}
