<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\VolumePurchasingSubscription;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\CreateVolumePurchasingSubscriptionHistoryV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\CreateVolumePurchasingSubscriptionsV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\DeleteVolumePurchasingSubscriptionV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionHistoryV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionsV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\ReplaceVolumePurchasingSubscriptionV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The volume-purchasing-subscriptions endpoints of the Jamf Pro API, from Jamf::volumePurchasingSubscriptions().
 *
 * @extends Builder<VolumePurchasingSubscription>
 */
class VolumePurchasingSubscriptionsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, VolumePurchasingSubscription::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetVolumePurchasingSubscriptionsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetVolumePurchasingSubscriptionV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateVolumePurchasingSubscriptionsV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceVolumePurchasingSubscriptionV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteVolumePurchasingSubscriptionV1Request($id);
    }

    /**
     * Add Volume Purchasing Subscription history object notes: POST /v1/volume-purchasing-subscriptions/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createVolumePurchasingSubscriptionHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateVolumePurchasingSubscriptionHistoryV1Request($id, $body, $options));
    }

    /**
     * Create a Volume Purchasing Subscription: POST /v1/volume-purchasing-subscriptions.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createVolumePurchasingSubscriptionsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateVolumePurchasingSubscriptionsV1Request($body, $options));
    }

    /**
     * Delete a Volume Purchasing Subscription with the supplied id: DELETE /v1/volume-purchasing-subscriptions/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteVolumePurchasingSubscriptionV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteVolumePurchasingSubscriptionV1Request($id, $options));
    }

    /**
     * Get specified Volume Purchasing Subscription history object: GET
     * /v1/volume-purchasing-subscriptions/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getVolumePurchasingSubscriptionHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetVolumePurchasingSubscriptionHistoryV1Request($id, $query));
    }

    /**
     * Retrieve a Volume Purchasing Subscription with the supplied id: GET /v1/volume-purchasing-subscriptions/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getVolumePurchasingSubscriptionV1(int|string $id, array $options = []): ?VolumePurchasingSubscription
    {
        return $this->fetch(new GetVolumePurchasingSubscriptionV1Request($id, $options));
    }

    /**
     * Retrieve Volume Purchasing Subscriptions: GET /v1/volume-purchasing-subscriptions.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<VolumePurchasingSubscription>
     */
    public function getVolumePurchasingSubscriptionsV1(): PagedResource
    {
        return new PagedResource($this->pro(), VolumePurchasingSubscription::class, fn (Query $query) => new GetVolumePurchasingSubscriptionsV1Request($query));
    }

    /**
     * Update a Volume Purchasing Subscription: PUT /v1/volume-purchasing-subscriptions/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceVolumePurchasingSubscriptionV1(int|string $id, array|JsonSerializable $body, array $options = []): ?VolumePurchasingSubscription
    {
        return $this->fetch(new ReplaceVolumePurchasingSubscriptionV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
