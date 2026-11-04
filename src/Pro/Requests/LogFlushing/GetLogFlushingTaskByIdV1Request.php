<?php

namespace spkm\Jamf\Pro\Requests\LogFlushing;

use spkm\Jamf\Pro\Data\LogFlushingTaskV1;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get log flushing task: GET /v1/log-flushing/task/{id}.
 *
 * Get the log flushing task by the specified ID
 */
class GetLogFlushingTaskByIdV1Request extends GetRequest
{
    protected ?string $dto = LogFlushingTaskV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/log-flushing/task/'.Path::segment((string) $this->id);
    }
}
