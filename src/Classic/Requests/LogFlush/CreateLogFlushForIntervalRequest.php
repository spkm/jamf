<?php

namespace spkm\Jamf\Classic\Requests\LogFlush;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Flushes a log for all policies for a given interval listed in the URL: DELETE /logflush/{log}/interval/{interval}.
 *
 * Interval is a combination of Zero, One, Two, Three, Six, and Day, Week, Month, Year. For example,
 * JSSResource/logflush/policies/interval/Three+Months
 */
class CreateLogFlushForIntervalRequest extends ClassicDeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $log, protected string $interval, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/logflush/'.Path::segment((string) $this->log).'/interval/'.Path::segment((string) $this->interval);
    }
}
