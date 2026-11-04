<?php

namespace spkm\Jamf\Pro\Requests\LogFlushing;

use spkm\Jamf\Pro\Data\LogFlushingTaskV1;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get log flushing tasks: GET /v1/log-flushing/task.
 *
 * Get a list of all log flushing tasks and their statuses
 */
class GetLogFlushingTaskV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LogFlushingTaskV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/log-flushing/task';
    }
}
