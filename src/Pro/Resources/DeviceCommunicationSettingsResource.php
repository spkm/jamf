<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\DeviceCommunicationSettings;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\DeviceCommunicationSettings\CreateDeviceCommunicationSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\DeviceCommunicationSettings\GetDeviceCommunicationSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\DeviceCommunicationSettings\GetDeviceCommunicationSettingsV1Request;
use spkm\Jamf\Pro\Requests\DeviceCommunicationSettings\ReplaceDeviceCommunicationSettingsV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The device-communication-settings endpoints of the Jamf Pro API, from Jamf::deviceCommunicationSettings().
 *
 * @extends Builder<ObjectHistory>
 */
class DeviceCommunicationSettingsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDeviceCommunicationSettingsHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateDeviceCommunicationSettingsHistoryV1Request($body);
    }

    /**
     * Add Device Communication Settings history notes: POST /v1/device-communication-settings/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createDeviceCommunicationSettingsHistoryV1(array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateDeviceCommunicationSettingsHistoryV1Request($body, $options));
    }

    /**
     * Get Device Communication settings history: GET /v1/device-communication-settings/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getDeviceCommunicationSettingsHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetDeviceCommunicationSettingsHistoryV1Request($query));
    }

    /**
     * Retrieves all settings for device communication: GET /v1/device-communication-settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDeviceCommunicationSettingsV1(array $options = []): ?DeviceCommunicationSettings
    {
        return $this->fetch(new GetDeviceCommunicationSettingsV1Request($options));
    }

    /**
     * Update device communication settings: PUT /v1/device-communication-settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceDeviceCommunicationSettingsV1(array|JsonSerializable $body, array $options = []): ?DeviceCommunicationSettings
    {
        return $this->fetch(new ReplaceDeviceCommunicationSettingsV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
