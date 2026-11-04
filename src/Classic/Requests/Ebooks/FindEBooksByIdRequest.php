<?php

namespace spkm\Jamf\Classic\Requests\Ebooks;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds ebooks by id: GET /ebooks/id/{id}.
 */
class FindEBooksByIdRequest extends ClassicGetRequest
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
        return '/ebooks/id/'.Path::segment((string) $this->id);
    }
}
