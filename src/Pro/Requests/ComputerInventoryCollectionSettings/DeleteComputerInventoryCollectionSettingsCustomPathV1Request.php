<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete Custom Path from Computer Inventory Collection Settings: DELETE /v1/computer-inventory-collection-settings/custom-path/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class DeleteComputerInventoryCollectionSettingsCustomPathV1Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-inventory-collection-settings/custom-path/'.Path::segment((string) $this->id);
    }
}
