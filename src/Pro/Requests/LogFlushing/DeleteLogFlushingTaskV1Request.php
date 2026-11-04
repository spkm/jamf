<?php

namespace spkm\Jamf\Pro\Requests\LogFlushing;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Cancels a log flushing task: DELETE /v1/log-flushing/task/{id}.
 */
class DeleteLogFlushingTaskV1Request extends DeleteRequest
{
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
