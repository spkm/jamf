<?php

namespace spkm\Jamf\Pro\Requests\StaticUserGroupsPreview;

use spkm\Jamf\Pro\Data\StaticUserGroup;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return a specific Static User Group by id: GET /v1/static-user-groups/{id}.
 *
 * Returns a specific static user group by id.
 */
class GetStaticUserGroupV1Request extends GetRequest
{
    protected ?string $dto = StaticUserGroup::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/static-user-groups/'.Path::segment((string) $this->id);
    }
}
