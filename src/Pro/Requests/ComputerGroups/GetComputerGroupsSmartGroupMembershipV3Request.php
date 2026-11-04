<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Pro\Data\SmartGroupMembership;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get the membership of a Smart Computer Group: GET /v3/computer-groups/smart-group-membership/{id}.
 *
 * Gets the membership of a Smart Computer Group
 */
class GetComputerGroupsSmartGroupMembershipV3Request extends GetRequest
{
    protected ?string $dto = SmartGroupMembership::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computer-groups/smart-group-membership/'.Path::segment((string) $this->id);
    }
}
