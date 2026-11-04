<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\VolumePurchasingSubscription;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Volume Purchasing Subscription: PUT /v1/volume-purchasing-subscriptions/{id}.
 *
 * Updates a Volume Purchasing Subscription
 */
class ReplaceVolumePurchasingSubscriptionV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = VolumePurchasingSubscription::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/volume-purchasing-subscriptions/'.Path::segment((string) $this->id);
    }
}
