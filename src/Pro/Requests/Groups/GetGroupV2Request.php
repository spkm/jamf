<?php

namespace spkm\Jamf\Pro\Requests\Groups;

use spkm\Jamf\Pro\Data\GroupWithCriteriaDtoV1;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Returns group information for the given platform UUID: GET /v2/groups/{id}.
 */
class GetGroupV2Request extends GetRequest
{
    protected ?string $dto = GroupWithCriteriaDtoV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/groups/'.Path::segment((string) $this->id);
    }
}
