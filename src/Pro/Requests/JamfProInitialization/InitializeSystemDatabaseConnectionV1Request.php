<?php

namespace spkm\Jamf\Pro\Requests\JamfProInitialization;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Provide Database Password during startup: POST /v1/system/initialize-database-connection.
 *
 * Provide database password during startup. Endpoint is accessible when database password was not configured and Jamf
 * Pro server has not been initialized yet.
 */
class InitializeSystemDatabaseConnectionV1Request extends WriteRequest
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
        return '/v1/system/initialize-database-connection';
    }
}
