<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\MobileDeviceExtensionAttributes;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\CreateMobileDeviceExtensionAttributeHistoryV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\CreateMobileDeviceExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\DeleteMobileDeviceExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeDataDependencyV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeHistoryV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\ReplaceMobileDeviceExtensionAttributeV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The mobile-device-extension-attributes endpoints of the Jamf Pro API, from Jamf::mobileDeviceExtensionAttributes().
 *
 * @extends Builder<MobileDeviceExtensionAttributes>
 */
class MobileDeviceExtensionAttributesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, MobileDeviceExtensionAttributes::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMobileDeviceExtensionAttributesV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetMobileDeviceExtensionAttributeV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateMobileDeviceExtensionAttributesV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceMobileDeviceExtensionAttributeV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteMobileDeviceExtensionAttributeV1Request($id);
    }

    /**
     * Add specified Mobile Device Extension Attribute history object notes: POST
     * /v1/mobile-device-extension-attributes/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDeviceExtensionAttributeHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateMobileDeviceExtensionAttributeHistoryV1Request($id, $body, $options));
    }

    /**
     * Create Mobile Device Extension Attribute: POST /v1/mobile-device-extension-attributes.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDeviceExtensionAttributesV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDeviceExtensionAttributesV1Request($body, $options));
    }

    /**
     * Delete a Mobile Device Extension Attribute by ID: DELETE /v1/mobile-device-extension-attributes/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceExtensionAttributeV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceExtensionAttributeV1Request($id, $options));
    }

    /**
     * Get smart group dependent object for a specified mobile device extension attribute: GET
     * /v1/mobile-device-extension-attributes/{id}/data-dependency.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function getMobileDeviceExtensionAttributeDataDependencyV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetMobileDeviceExtensionAttributeDataDependencyV1Request($id, $options));
    }

    /**
     * Get specified Mobile Device Extension Attribute History object: GET
     * /v1/mobile-device-extension-attributes/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getMobileDeviceExtensionAttributeHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetMobileDeviceExtensionAttributeHistoryV1Request($id, $query));
    }

    /**
     * Get specified Mobile Device Extension Attribute object: GET /v1/mobile-device-extension-attributes/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDeviceExtensionAttributeV1(int|string $id, array $options = []): ?MobileDeviceExtensionAttributes
    {
        return $this->fetch(new GetMobileDeviceExtensionAttributeV1Request($id, $options));
    }

    /**
     * Retrieve Mobile Device Extension Attributes: GET /v1/mobile-device-extension-attributes.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<MobileDeviceExtensionAttributes>
     */
    public function getMobileDeviceExtensionAttributesV1(): PagedResource
    {
        return new PagedResource($this->pro(), MobileDeviceExtensionAttributes::class, fn (Query $query) => new GetMobileDeviceExtensionAttributesV1Request($query));
    }

    /**
     * Update specified Mobile Device Extension Attribute object: PUT /v1/mobile-device-extension-attributes/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceMobileDeviceExtensionAttributeV1(int|string $id, array|JsonSerializable $body, array $options = []): ?MobileDeviceExtensionAttributes
    {
        return $this->fetch(new ReplaceMobileDeviceExtensionAttributeV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
