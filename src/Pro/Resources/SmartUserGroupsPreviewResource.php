<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SmartUserGroupsPreview\RecalculateSmartUserGroupV1Request;
use spkm\Jamf\Pro\Requests\SmartUserGroupsPreview\RecalculateUserSmartGroupsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The smart-user-groups-preview endpoints of the Jamf Pro API, from Jamf::smartUserGroupsPreview().
 *
 * @extends BaseResource<Data>
 */
class SmartUserGroupsPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Recalculate the smart group for the given id and then return the ids for the users in the smart group: POST
     * /v1/smart-user-groups/{id}/recalculate.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function recalculateSmartUserGroupV1(int|string $id, array $options = []): ?RecalculationResults
    {
        return $this->fetch(new RecalculateSmartUserGroupV1Request($id, $options));
    }

    /**
     * Recalculate a smart group for the given user id and then return the count of smart groups the user falls into:
     * POST /v1/users/{id}/recalculate-smart-groups.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function recalculateUserSmartGroupsV1(int|string $id, array $options = []): ?RecalculationResults
    {
        return $this->fetch(new RecalculateUserSmartGroupsV1Request($id, $options));
    }
}
