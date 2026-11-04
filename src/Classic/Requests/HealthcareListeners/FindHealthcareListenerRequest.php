<?php

namespace spkm\Jamf\Classic\Requests\HealthcareListeners;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Find all Healthcare Listener: GET /healthcarelistener.
 */
class FindHealthcareListenerRequest extends ClassicGetRequest
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
        return '/healthcarelistener';
    }
}
