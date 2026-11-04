<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Volume Purchasing Subscription history object: GET /v1/volume-purchasing-subscriptions/{id}/history.
 *
 * Gets specified Volume Purchasing Subscription history object
 */
class GetVolumePurchasingSubscriptionHistoryV1Request extends ListRequest
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
        return '/v1/volume-purchasing-subscriptions/'.Path::segment((string) $this->id).'/history';
    }
}
