<?php

namespace spkm\Jamf\Classic\Requests\UserGroups;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all user groups: GET /usergroups.
 */
class FindUserGroupsRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/usergroups';
    }
}
