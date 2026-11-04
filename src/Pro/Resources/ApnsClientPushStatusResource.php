<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ApnsClientPushStatus;
use spkm\Jamf\Pro\Data\ApnsPushEnableRequest;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ApnsClientPushStatus\EnableApnsClientPushStatusAllClientsV1Request;
use spkm\Jamf\Pro\Requests\ApnsClientPushStatus\EnableApnsClientPushStatusClientV1Request;
use spkm\Jamf\Pro\Requests\ApnsClientPushStatus\GetApnsClientPushStatusEnableAllClientsStatusV1Request;
use spkm\Jamf\Pro\Requests\ApnsClientPushStatus\GetApnsClientPushStatusV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The apns-client-push-status endpoints of the Jamf Pro API, from Jamf::apnsClientPushStatus().
 *
 * @extends Builder<ApnsClientPushStatus>
 */
class ApnsClientPushStatusResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ApnsClientPushStatus::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApnsClientPushStatusV1Request($query);
    }

    /**
     * Enable push notifications for all clients: POST /v1/apns-client-push-status/enable-all-clients.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function enableApnsClientPushStatusAllClientsV1(array $options = []): bool
    {
        return $this->perform(new EnableApnsClientPushStatusAllClientsV1Request($options));
    }

    /**
     * Enable push notifications for a single client: POST /v1/apns-client-push-status/enable-client.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function enableApnsClientPushStatusClientV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new EnableApnsClientPushStatusClientV1Request($body, $options));
    }

    /**
     * Get status of enable all clients request: GET /v1/apns-client-push-status/enable-all-clients/status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getApnsClientPushStatusEnableAllClientsStatusV1(array $options = []): ?ApnsPushEnableRequest
    {
        return $this->fetch(new GetApnsClientPushStatusEnableAllClientsStatusV1Request($options));
    }

    /**
     * Search for clients with push notifications disabled: GET /v1/apns-client-push-status.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ApnsClientPushStatus>
     */
    public function getApnsClientPushStatusV1(): PagedResource
    {
        return new PagedResource($this->pro(), ApnsClientPushStatus::class, fn (Query $query) => new GetApnsClientPushStatusV1Request($query));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
