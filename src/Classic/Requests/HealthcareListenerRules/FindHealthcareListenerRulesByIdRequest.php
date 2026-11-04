<?php

namespace spkm\Jamf\Classic\Requests\HealthcareListenerRules;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds Healthcare Listener rules by id: GET /healthcarelistenerrule/id/{id}.
 */
class FindHealthcareListenerRulesByIdRequest extends ClassicGetRequest
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
        return '/healthcarelistenerrule/id/'.Path::segment((string) $this->id);
    }
}
