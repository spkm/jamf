<?php

namespace spkm\Jamf\Classic\Requests\Classes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all classes: GET /classes.
 */
class FindClassesRequest extends ClassicGetRequest
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
        return '/classes';
    }
}
