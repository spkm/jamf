<?php

namespace spkm\Jamf\Classic\Requests\CommandFlush;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;

/**
 * Flushes commands based on information specified in an XML file: DELETE /commandflush.
 *
 * Status and devices specified in an XML file. Id lists may be specified for , , , . Sample file: Pending+Failed12
 */
class CommandFlushRequest extends ClassicDeleteRequest
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
        return '/commandflush';
    }
}
