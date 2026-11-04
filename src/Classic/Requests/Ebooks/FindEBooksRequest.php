<?php

namespace spkm\Jamf\Classic\Requests\Ebooks;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all ebooks: GET /ebooks.
 */
class FindEBooksRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/ebooks';
    }
}
