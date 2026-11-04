<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get sorted and paged Mobile Device Prestage history objects: GET /v2/mobile-device-prestages/{id}/history.
 *
 * Gets sorted and paged mobile device prestage history objects
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetMobileDevicePrestageHistoryV2Request extends ListRequest
{
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
        return '/v2/mobile-device-prestages/'.Path::segment((string) $this->id).'/history';
    }
}
