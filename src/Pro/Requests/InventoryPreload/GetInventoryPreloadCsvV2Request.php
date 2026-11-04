<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use spkm\Jamf\Requests\GetRequest;

/**
 * Download all Inventory Preload records: GET /v2/inventory-preload/csv.
 *
 * Returns all Inventory Preload records as a CSV file.
 */
class GetInventoryPreloadCsvV2Request extends GetRequest
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
        return '/v2/inventory-preload/csv';
    }
}
