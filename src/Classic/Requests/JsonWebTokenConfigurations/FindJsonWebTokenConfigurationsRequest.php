<?php

namespace spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all JSON Web Token configurations: GET /jsonwebtokenconfigurations.
 */
class FindJsonWebTokenConfigurationsRequest extends ClassicGetRequest
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
        return '/jsonwebtokenconfigurations';
    }
}
