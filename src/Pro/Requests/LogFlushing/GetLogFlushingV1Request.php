<?php

namespace spkm\Jamf\Pro\Requests\LogFlushing;

use spkm\Jamf\Pro\Data\LogFlushingV1;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get log flushing settings: GET /v1/log-flushing.
 *
 * Get all log flushing and retention policy settings
 */
class GetLogFlushingV1Request extends GetRequest
{
    protected ?string $dto = LogFlushingV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/log-flushing';
    }
}
