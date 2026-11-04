<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a Volume Purchasing Subscription with the supplied id: DELETE /v1/volume-purchasing-subscriptions/{id}.
 *
 * Deletes a Volume Purchasing Subscription with the supplied id
 */
class DeleteVolumePurchasingSubscriptionV1Request extends DeleteRequest
{
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
