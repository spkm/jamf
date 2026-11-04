<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\StaticUserGroup;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\StaticUserGroupsPreview\GetStaticUserGroupsV1Request;
use spkm\Jamf\Pro\Requests\StaticUserGroupsPreview\GetStaticUserGroupV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The static-user-groups-preview endpoints of the Jamf Pro API, from Jamf::staticUserGroupsPreview().
 *
 * @extends BaseResource<Data>
 */
class StaticUserGroupsPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Return a specific Static User Group by id: GET /v1/static-user-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getStaticUserGroupV1(int|string $id, array $options = []): ?StaticUserGroup
    {
        return $this->fetch(new GetStaticUserGroupV1Request($id, $options));
    }

    /**
     * Return a list of all Static User Groups: GET /v1/static-user-groups.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, StaticUserGroup>
     */
    public function getStaticUserGroupsV1(array $options = []): Collection
    {
        return $this->fetch(new GetStaticUserGroupsV1Request($options));
    }
}
