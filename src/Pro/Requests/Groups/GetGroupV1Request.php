<?php

namespace spkm\Jamf\Pro\Requests\Groups;

use spkm\Jamf\Pro\Data\GroupWithCriteriaDtoV1;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Returns group information for the given platform UUID: GET /v1/groups/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class GetGroupV1Request extends GetRequest
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
        return '/v1/groups/'.Path::segment((string) $this->id);
    }
}
