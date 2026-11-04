<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\HealthcareListenerRules\CreateHealthCareListenerRuleByIdRequest;
use spkm\Jamf\Classic\Requests\HealthcareListenerRules\FindHealthcareListenerRuleRequest;
use spkm\Jamf\Classic\Requests\HealthcareListenerRules\FindHealthcareListenerRulesByIdRequest;
use spkm\Jamf\Classic\Requests\HealthcareListenerRules\UpdateHealthCareListenerRuleByIdRequest;

/**
 * The healthcarelistenerrule endpoints of the Classic API, from Jamf::classic()->healthcareListenerRules().
 */
class HealthcareListenerRulesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindHealthcareListenerRuleRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindHealthcareListenerRulesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateHealthCareListenerRuleByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateHealthCareListenerRuleByIdRequest($id, $record);
    }

    /**
     * Creates a new Healthcare Listener rule: POST /healthcarelistenerrule/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <healthcare_listener_rule>), or the XML itself.
     */
    public function createHealthCareListenerRuleById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateHealthCareListenerRuleByIdRequest($id, $record));
    }

    /**
     * Find all Healthcare Listener rules: GET /healthcarelistenerrule.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findHealthcareListenerRule(array $options = []): Collection
    {
        return $this->fetch(new FindHealthcareListenerRuleRequest($options));
    }

    /**
     * Finds Healthcare Listener rules by id: GET /healthcarelistenerrule/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findHealthcareListenerRulesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindHealthcareListenerRulesByIdRequest($id, $options));
    }

    /**
     * Updates an existing Healthcare Listener rule by id: PUT /healthcarelistenerrule/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <healthcare_listener_rule>), or the XML itself.
     */
    public function updateHealthCareListenerRuleById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateHealthCareListenerRuleByIdRequest($id, $record));
    }
}
