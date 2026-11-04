<?php

namespace spkm\Jamf\Classic\Requests\Buildings;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all buildings: GET /buildings.
 */
class FindBuildingsRequest extends ClassicGetRequest
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
        return '/buildings';
    }
}
