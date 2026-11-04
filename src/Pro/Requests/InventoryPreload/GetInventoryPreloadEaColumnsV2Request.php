<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use spkm\Jamf\Pro\Data\InventoryPreloadExtensionAttributeColumn;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve a list of extension attribute columns: GET /v2/inventory-preload/ea-columns.
 */
class GetInventoryPreloadEaColumnsV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = InventoryPreloadExtensionAttributeColumn::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/inventory-preload/ea-columns';
    }
}
