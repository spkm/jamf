<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings;

use spkm\Jamf\Pro\Data\ComputerInventoryCollectionSettingsV2;
use spkm\Jamf\Requests\GetRequest;

/**
 * Returns computer inventory settings: GET /v2/computer-inventory-collection-settings.
 */
class GetComputerInventoryCollectionSettingsV2Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryCollectionSettingsV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computer-inventory-collection-settings';
    }
}
