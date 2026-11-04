<?php

namespace spkm\Jamf\Classic\Requests\Ebooks;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds ebooks by name: GET /ebooks/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindEBooksByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/ebooks/name/'.Path::segment((string) $this->name);
    }
}
