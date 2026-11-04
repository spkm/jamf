<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV3;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get sorted and paged Mobile Device Prestages: GET /v3/mobile-device-prestages.
 *
 * Gets sorted and paged mobile device prestages
 */
class GetMobileDevicePrestagesV3Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = GetMobileDevicePrestageV3::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v3/mobile-device-prestages';
    }
}
