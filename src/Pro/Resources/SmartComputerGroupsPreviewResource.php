<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SmartComputerGroupsPreview\RecalculateComputerSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\SmartComputerGroupsPreview\RecalculateSmartComputerGroupV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The smart-computer-groups-preview endpoints of the Jamf Pro API, from Jamf::smartComputerGroupsPreview().
 *
 * @extends BaseResource<Data>
 */
class SmartComputerGroupsPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Recalculate a smart group for the given id: POST /v1/computers/{id}/recalculate-smart-groups.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function recalculateComputerSmartGroupsV1(int|string $id, array $options = []): ?RecalculationResults
    {
        return $this->fetch(new RecalculateComputerSmartGroupsV1Request($id, $options));
    }

    /**
     * Recalculate the smart group for the given id: POST /v1/smart-computer-groups/{id}/recalculate.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function recalculateSmartComputerGroupV1(int|string $id, array $options = []): ?RecalculationResults
    {
        return $this->fetch(new RecalculateSmartComputerGroupV1Request($id, $options));
    }
}
