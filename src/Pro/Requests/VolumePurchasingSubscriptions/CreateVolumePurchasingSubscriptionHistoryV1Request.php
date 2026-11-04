<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Add Volume Purchasing Subscription history object notes: POST /v1/volume-purchasing-subscriptions/{id}/history.
 *
 * Adds Volume Purchasing Subscription history object notes
 */
class CreateVolumePurchasingSubscriptionHistoryV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

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
        return '/v1/volume-purchasing-subscriptions/'.Path::segment((string) $this->id).'/history';
    }
}
