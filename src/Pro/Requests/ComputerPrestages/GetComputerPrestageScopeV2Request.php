<?php

namespace spkm\Jamf\Pro\Requests\ComputerPrestages;

use spkm\Jamf\Pro\Data\PrestageScopeResponseV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get device Scope for a specific Computer Prestage: GET /v2/computer-prestages/{id}/scope.
 *
 * Get device scope for a specific computer prestage
 */
class GetComputerPrestageScopeV2Request extends GetRequest
{
    protected ?string $dto = PrestageScopeResponseV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computer-prestages/'.Path::segment((string) $this->id).'/scope';
    }
}
