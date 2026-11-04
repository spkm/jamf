<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\LogFlush\CreateLogFlushForIntervalRequest;
use spkm\Jamf\Classic\Requests\LogFlush\CreateLogFlushWithIdAndIntervalRequest;
use spkm\Jamf\Classic\Requests\LogFlush\LogFlushRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The logflush endpoints of the Classic API, from Jamf::classic()->logFlush().
 *
 * @extends BaseResource<never>
 */
class LogFlushResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Flushes a log for all policies for a given interval listed in the URL: DELETE
     * /logflush/{log}/interval/{interval}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createLogFlushForInterval(string $log, string $interval, array $options = []): bool
    {
        return $this->perform(new CreateLogFlushForIntervalRequest($log, $interval, $options));
    }

    /**
     * Flushes a log for a policy for a given interval listed in the URL: DELETE
     * /logflush/{log}/id/{id}/interval/{interval}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createLogFlushWithIdAndInterval(string $log, int|string $id, string $interval, array $options = []): bool
    {
        return $this->perform(new CreateLogFlushWithIdAndIntervalRequest($log, $id, $interval, $options));
    }

    /**
     * Flushes a log specified in an XML file: DELETE /logflush.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function logFlush(array $options = []): bool
    {
        return $this->perform(new LogFlushRequest($options));
    }
}
