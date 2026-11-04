<?php

namespace spkm\Jamf\Classic\Requests\HealthcareListenerRules;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new Healthcare Listener rule: POST /healthcarelistenerrule/id/{id}.
 */
class CreateHealthCareListenerRuleByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'healthcare_listener_rule';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <healthcare_listener_rule>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/healthcarelistenerrule/id/'.Path::segment((string) $this->id);
    }
}
