<?php

namespace spkm\Jamf\Classic\Requests\HealthcareListenerRules;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing Healthcare Listener rule by id: PUT /healthcarelistenerrule/id/{id}.
 */
class UpdateHealthCareListenerRuleByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
