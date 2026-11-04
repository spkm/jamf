<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use spkm\Jamf\Requests\GetRequest;

/**
 * Download the Inventory Preload CSV template: GET /v2/inventory-preload/csv-template.
 *
 * Retrieves the Inventory Preload CSV file template.
 */
class GetInventoryPreloadCsvTemplateV2Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'text/csv';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/inventory-preload/csv-template';
    }
}
