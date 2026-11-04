<?php

namespace spkm\Jamf\Pro\Requests\ComputerPrestages;

use spkm\Jamf\Pro\Data\GetComputerPrestageV3;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Computer Prestage with the supplied id: GET /v3/computer-prestages/{id}.
 *
 * Retrieves a Computer Prestage with the supplied id
 */
class GetComputerPrestageV3Request extends GetRequest
{
    protected ?string $dto = GetComputerPrestageV3::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computer-prestages/'.Path::segment((string) $this->id);
    }
}
