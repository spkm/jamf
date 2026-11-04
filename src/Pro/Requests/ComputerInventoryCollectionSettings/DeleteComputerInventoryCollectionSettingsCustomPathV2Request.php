<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete Custom Path from Computer Inventory Collection Settings: DELETE /v2/computer-inventory-collection-settings/custom-path/{id}.
 */
class DeleteComputerInventoryCollectionSettingsCustomPathV2Request extends DeleteRequest
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
        return '/v2/computer-inventory-collection-settings/custom-path/'.Path::segment((string) $this->id);
    }
}
