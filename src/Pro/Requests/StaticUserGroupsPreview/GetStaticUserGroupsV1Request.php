<?php

namespace spkm\Jamf\Pro\Requests\StaticUserGroupsPreview;

use spkm\Jamf\Pro\Data\StaticUserGroup;
use spkm\Jamf\Requests\GetRequest;

/**
 * Return a list of all Static User Groups: GET /v1/static-user-groups.
 *
 * Returns a list of all static user groups.
 */
class GetStaticUserGroupsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = StaticUserGroup::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/static-user-groups';
    }
}
