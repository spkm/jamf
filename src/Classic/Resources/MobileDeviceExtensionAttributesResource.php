<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\CreateMobiledeviceextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\DeleteMobiledeviceextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\UpdateMobiledeviceextensionattributeByIdRequest;

/**
 * The mobiledeviceextensionattributes endpoints of the Classic API, from Jamf::classic()->mobileDeviceExtensionAttributes().
 */
class MobileDeviceExtensionAttributesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobiledeviceextensionattributesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMobiledeviceextensionattributesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMobiledeviceextensionattributeByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateMobiledeviceextensionattributeByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMobiledeviceextensionattributeByIdRequest($id);
    }

    /**
     * Creates a new mobile device extension attribute by id: POST /mobiledeviceextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_extension_attribute>), or the XML itself.
     */
    public function createMobiledeviceextensionattributeById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobiledeviceextensionattributeByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device extension attribute by id: DELETE /mobiledeviceextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobiledeviceextensionattributeById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobiledeviceextensionattributeByIdRequest($id, $options));
    }

    /**
     * Finds all mobile device extension attributes: GET /mobiledeviceextensionattributes.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobiledeviceextensionattributes(array $options = []): Collection
    {
        return $this->fetch(new FindMobiledeviceextensionattributesRequest($options));
    }

    /**
     * Finds mobile device extension attributes by id: GET /mobiledeviceextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobiledeviceextensionattributesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobiledeviceextensionattributesByIdRequest($id, $options));
    }

    /**
     * Finds mobiledeviceextensionattributes by name: GET /mobiledeviceextensionattributes/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobiledeviceextensionattributesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobiledeviceextensionattributesByNameRequest($name, $options));
    }

    /**
     * Updates an existing mobile device extension attribute by id: PUT /mobiledeviceextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_extension_attribute>), or the XML itself.
     */
    public function updateMobiledeviceextensionattributeById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateMobiledeviceextensionattributeByIdRequest($id, $record));
    }
}
