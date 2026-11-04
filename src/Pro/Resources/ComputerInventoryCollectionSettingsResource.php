<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\ComputerInventoryCollectionSettings;
use spkm\Jamf\Pro\Data\ComputerInventoryCollectionSettingsV2;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\CreateComputerInventoryCollectionSettingsCustomPathV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\CreateComputerInventoryCollectionSettingsCustomPathV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\DeleteComputerInventoryCollectionSettingsCustomPathV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\DeleteComputerInventoryCollectionSettingsCustomPathV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\GetComputerInventoryCollectionSettingsV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\GetComputerInventoryCollectionSettingsV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\UpdateComputerInventoryCollectionSettingsV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\UpdateComputerInventoryCollectionSettingsV2Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The computer-inventory-collection-settings endpoints of the Jamf Pro API, from Jamf::computerInventoryCollectionSettings().
 *
 * @extends BaseResource<Data>
 */
class ComputerInventoryCollectionSettingsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create Computer Inventory Collection Settings Custom Path: POST
     * /v1/computer-inventory-collection-settings/custom-path.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerInventoryCollectionSettingsCustomPathV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerInventoryCollectionSettingsCustomPathV1Request($body, $options));
    }

    /**
     * Create Computer Inventory Collection Settings Custom Path: POST
     * /v2/computer-inventory-collection-settings/custom-path.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerInventoryCollectionSettingsCustomPathV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerInventoryCollectionSettingsCustomPathV2Request($body, $options));
    }

    /**
     * Delete Custom Path from Computer Inventory Collection Settings: DELETE
     * /v1/computer-inventory-collection-settings/custom-path/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryCollectionSettingsCustomPathV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryCollectionSettingsCustomPathV1Request($id, $options));
    }

    /**
     * Delete Custom Path from Computer Inventory Collection Settings: DELETE
     * /v2/computer-inventory-collection-settings/custom-path/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryCollectionSettingsCustomPathV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryCollectionSettingsCustomPathV2Request($id, $options));
    }

    /**
     * Returns computer inventory settings: GET /v1/computer-inventory-collection-settings.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryCollectionSettingsV1(array $options = []): ?ComputerInventoryCollectionSettings
    {
        return $this->fetch(new GetComputerInventoryCollectionSettingsV1Request($options));
    }

    /**
     * Returns computer inventory settings: GET /v2/computer-inventory-collection-settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryCollectionSettingsV2(array $options = []): ?ComputerInventoryCollectionSettingsV2
    {
        return $this->fetch(new GetComputerInventoryCollectionSettingsV2Request($options));
    }

    /**
     * Update computer inventory settings: PATCH /v1/computer-inventory-collection-settings.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateComputerInventoryCollectionSettingsV1(array|JsonSerializable $body, array $options = []): ?ComputerInventoryCollectionSettings
    {
        return $this->fetch(new UpdateComputerInventoryCollectionSettingsV1Request($body, $options));
    }

    /**
     * Update computer inventory settings: PATCH /v2/computer-inventory-collection-settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateComputerInventoryCollectionSettingsV2(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdateComputerInventoryCollectionSettingsV2Request($body, $options));
    }
}
