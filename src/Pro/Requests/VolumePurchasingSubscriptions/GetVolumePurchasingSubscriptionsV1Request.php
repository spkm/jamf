<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions;

use spkm\Jamf\Pro\Data\VolumePurchasingSubscription;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve Volume Purchasing Subscriptions: GET /v1/volume-purchasing-subscriptions.
 *
 * Retrieves Volume Purchasing Subscriptions
 */
class GetVolumePurchasingSubscriptionsV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = VolumePurchasingSubscription::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/volume-purchasing-subscriptions';
    }
}
