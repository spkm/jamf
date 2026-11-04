<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes data collected by an extension attribute: DELETE /computers/extensionattributedataflush/id/{id}.
 */
class FlushComputerExtensionAttributeDataRequest extends ClassicDeleteRequest
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
        return '/computers/extensionattributedataflush/id/'.Path::segment((string) $this->id);
    }
}
