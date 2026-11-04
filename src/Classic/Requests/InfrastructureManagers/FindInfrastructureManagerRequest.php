<?php

namespace spkm\Jamf\Classic\Requests\InfrastructureManagers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Find all Infrastructure Managers: GET /infrastructuremanager.
 */
class FindInfrastructureManagerRequest extends ClassicGetRequest
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
        return '/infrastructuremanager';
    }
}
