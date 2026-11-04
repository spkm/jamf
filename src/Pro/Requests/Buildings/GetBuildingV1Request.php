<?php

namespace spkm\Jamf\Pro\Requests\Buildings;

use spkm\Jamf\Pro\Data\Building;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Building object: GET /v1/buildings/{id}.
 *
 * Gets specified Building object
 */
class GetBuildingV1Request extends GetRequest
{
    protected ?string $dto = Building::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/buildings/'.Path::segment((string) $this->id);
    }
}
