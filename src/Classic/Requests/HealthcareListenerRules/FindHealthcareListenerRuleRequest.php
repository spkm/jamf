<?php

namespace spkm\Jamf\Classic\Requests\HealthcareListenerRules;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Find all Healthcare Listener rules: GET /healthcarelistenerrule.
 */
class FindHealthcareListenerRuleRequest extends ClassicGetRequest
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
        return '/healthcarelistenerrule';
    }
}
