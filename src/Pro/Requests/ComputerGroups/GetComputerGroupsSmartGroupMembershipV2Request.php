<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Pro\Data\SmartGroupMembership;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get the membership of a Smart Computer Group: GET /v2/computer-groups/smart-group-membership/{id}.
 *
 * Gets the membership of a Smart Computer Group
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class GetComputerGroupsSmartGroupMembershipV2Request extends GetRequest
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
        return '/v2/computer-groups/smart-group-membership/'.Path::segment((string) $this->id);
    }
}
