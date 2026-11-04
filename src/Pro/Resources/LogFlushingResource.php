<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\LogFlushingTaskV1;
use spkm\Jamf\Pro\Data\LogFlushingV1;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\LogFlushing\CreateLogFlushingTaskV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\DeleteLogFlushingTaskV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\GetLogFlushingTaskByIdV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\GetLogFlushingTaskV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\GetLogFlushingV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The log-flushing endpoints of the Jamf Pro API, from Jamf::logFlushing().
 *
 * @extends BaseResource<Data>
 */
class LogFlushingResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Queue a log flushing task: POST /v1/log-flushing/task.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createLogFlushingTaskV1(array|JsonSerializable $body = [], array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateLogFlushingTaskV1Request($body, $options));
    }

    /**
     * Cancels a log flushing task: DELETE /v1/log-flushing/task/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteLogFlushingTaskV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteLogFlushingTaskV1Request($id, $options));
    }

    /**
     * Get log flushing task: GET /v1/log-flushing/task/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getLogFlushingTaskByIdV1(int|string $id, array $options = []): ?LogFlushingTaskV1
    {
        return $this->fetch(new GetLogFlushingTaskByIdV1Request($id, $options));
    }

    /**
     * Get log flushing tasks: GET /v1/log-flushing/task.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LogFlushingTaskV1>
     */
    public function getLogFlushingTaskV1(array $options = []): Collection
    {
        return $this->fetch(new GetLogFlushingTaskV1Request($options));
    }

    /**
     * Get log flushing settings: GET /v1/log-flushing.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getLogFlushingV1(array $options = []): ?LogFlushingV1
    {
        return $this->fetch(new GetLogFlushingV1Request($options));
    }
}
