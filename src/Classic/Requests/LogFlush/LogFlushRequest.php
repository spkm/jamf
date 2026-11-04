<?php

namespace spkm\Jamf\Classic\Requests\LogFlush;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;

/**
 * Flushes a log specified in an XML file: DELETE /logflush.
 *
 * log, log_id, interval, and devices specified in an XML file. Sample file: policy2THREE MONTHS12
 */
class LogFlushRequest extends ClassicDeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/logflush';
    }
}
