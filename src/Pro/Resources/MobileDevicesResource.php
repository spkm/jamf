<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\EraseDeviceMobileDeviceResponse;
use spkm\Jamf\Pro\Data\MobileDeviceDetailsGetV2;
use spkm\Jamf\Pro\Data\MobileDeviceDetailsV2;
use spkm\Jamf\Pro\Data\MobileDeviceResponse;
use spkm\Jamf\Pro\Data\MobileDeviceV2;
use spkm\Jamf\Pro\Data\UnmanageMobileDeviceResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MobileDevices\EraseMobileDeviceV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDeviceDetailV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDevicePairedDevicesV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDevicesDetailV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDevicesV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDeviceV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\UnmanageMobileDeviceV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\UpdateMobileDeviceV2Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The mobile-devices endpoints of the Jamf Pro API, from Jamf::mobileDevices().
 *
 * @extends Builder<MobileDeviceV2>
 */
class MobileDevicesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, MobileDeviceV2::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMobileDevicesV2Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetMobileDeviceV2Request($id);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new UpdateMobileDeviceV2Request($id, $body);
    }

    /**
     * Erase a Mobile Device: POST /v2/mobile-devices/{id}/erase.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function eraseMobileDeviceV2(int|string $id, array|JsonSerializable $body = [], array $options = []): ?EraseDeviceMobileDeviceResponse
    {
        return $this->fetch(new EraseMobileDeviceV2Request($id, $body, $options));
    }

    /**
     * Get Mobile Device: GET /v2/mobile-devices/{id}/detail.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDeviceDetailV2(int|string $id, array $options = []): ?MobileDeviceDetailsGetV2
    {
        return $this->fetch(new GetMobileDeviceDetailV2Request($id, $options));
    }

    /**
     * Return paginated Mobile Device Inventory records of all paired devices for the device: GET
     * /v2/mobile-devices/{id}/paired-devices.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<MobileDeviceResponse>
     */
    public function getMobileDevicePairedDevicesV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), MobileDeviceResponse::class, fn (Query $query) => new GetMobileDevicePairedDevicesV2Request($id, $query));
    }

    /**
     * Get Mobile Device: GET /v2/mobile-devices/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDeviceV2(int|string $id, array $options = []): ?MobileDeviceV2
    {
        return $this->fetch(new GetMobileDeviceV2Request($id, $options));
    }

    /**
     * Return paginated Mobile Device Inventory records: GET /v2/mobile-devices/detail.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<MobileDeviceResponse>
     */
    public function getMobileDevicesDetailV2(): PagedResource
    {
        return new PagedResource($this->pro(), MobileDeviceResponse::class, fn (Query $query) => new GetMobileDevicesDetailV2Request($query));
    }

    /**
     * Get Mobile Device objects: GET /v2/mobile-devices.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<MobileDeviceV2>
     */
    public function getMobileDevicesV2(): PagedResource
    {
        return new PagedResource($this->pro(), MobileDeviceV2::class, fn (Query $query) => new GetMobileDevicesV2Request($query));
    }

    /**
     * Unmanage a Mobile Device: POST /v2/mobile-devices/{id}/unmanage.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function unmanageMobileDeviceV2(int|string $id, array $options = []): ?UnmanageMobileDeviceResponse
    {
        return $this->fetch(new UnmanageMobileDeviceV2Request($id, $options));
    }

    /**
     * Update fields on a mobile device that are allowed to be modified by users: PATCH /v2/mobile-devices/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateMobileDeviceV2(int|string $id, array|JsonSerializable $body, array $options = []): ?MobileDeviceDetailsV2
    {
        return $this->fetch(new UpdateMobileDeviceV2Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
