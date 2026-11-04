<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV2;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get sorted and paged Mobile Device Prestages: GET /v2/mobile-device-prestages.
 *
 * Gets sorted and paged mobile device prestages
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetMobileDevicePrestagesV2Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = GetMobileDevicePrestageV2::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-device-prestages';
    }
}
