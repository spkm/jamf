<?php

namespace spkm\Jamf\Pro\Requests\ComputerPrestages;

use spkm\Jamf\Pro\Data\PrestageScopeV2;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get all device Scope for all Computer Prestages: GET /v2/computer-prestages/scope.
 *
 * Get all device scope for all computer prestages
 */
class GetComputerPrestagesScopeV2Request extends GetRequest
{
    protected ?string $dto = PrestageScopeV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computer-prestages/scope';
    }
}
