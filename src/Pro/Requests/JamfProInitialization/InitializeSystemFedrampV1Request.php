<?php

namespace spkm\Jamf\Pro\Requests\JamfProInitialization;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Set up a fresh installed Jamf Pro Server for FedRAMP: POST /v1/system/fedramp-initialize.
 *
 * Performs the fresh-install initialization of a FedRAMP instance: creates the initial federated account, records the
 * activation code and Jamf Pro URL, acknowledges the EULA, persists the tenant's OIDC broker (Keycloak) configuration
 * UUID, and enables FedRAMP SSO. Run-once operation: allowed only on a FedRAMP instance, while no JSS users exist,
 * the broker is enabled, and no broker UUID is already stored. Gated by the activation code, matching the sibling
 * init endpoints. Non-FedRAMP instances are rejected with INVALID_STATE.
 */
class InitializeSystemFedrampV1Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/system/fedramp-initialize';
    }
}
