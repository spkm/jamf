<?php

namespace spkm\Jamf\Classic\Requests\LogFlush;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Flushes a log for a policy for a given interval listed in the URL: DELETE /logflush/{log}/id/{id}/interval/{interval}.
 *
 * Interval is a combination of Zero, One, Two, Three, Six, and Day, Week, Month, Year. For example,
 * JSSResource/logflush/policies/interval/Three+Months
 */
class CreateLogFlushWithIdAndIntervalRequest extends ClassicDeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $log, protected int|string $id, protected string $interval, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/logflush/'.Path::segment((string) $this->log).'/id/'.Path::segment((string) $this->id).'/interval/'.Path::segment((string) $this->interval);
    }
}
