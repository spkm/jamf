<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings;

use spkm\Jamf\Pro\Data\ComputerInventoryCollectionSettings;
use spkm\Jamf\Requests\GetRequest;

/**
 * Returns computer inventory settings: GET /v1/computer-inventory-collection-settings.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetComputerInventoryCollectionSettingsV1Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryCollectionSettings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-inventory-collection-settings';
    }
}
