<?php

namespace spkm\Jamf\Pro\Requests\StartupStatus;

use spkm\Jamf\Pro\Data\StartupStatus;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve information about application startup: GET /startup-status.
 *
 * Retrieves information about application startup. Current startup operation taking place (if any) and overall
 * startup completion percentage.
 */
class GetStartupStatusRequest extends GetRequest
{
    protected ?string $dto = StartupStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/startup-status';
    }
}
