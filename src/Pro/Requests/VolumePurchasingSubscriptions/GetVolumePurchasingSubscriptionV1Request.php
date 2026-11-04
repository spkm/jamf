<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions;

use spkm\Jamf\Pro\Data\VolumePurchasingSubscription;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Volume Purchasing Subscription with the supplied id: GET /v1/volume-purchasing-subscriptions/{id}.
 *
 * Retrieves a Volume Purchasing Subscription with the supplied id
 */
class GetVolumePurchasingSubscriptionV1Request extends GetRequest
{
    protected ?string $dto = VolumePurchasingSubscription::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/volume-purchasing-subscriptions/'.Path::segment((string) $this->id);
    }
}
