<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfProInitialization\InitializeSystemDatabaseConnectionV1Request;
use spkm\Jamf\Pro\Requests\JamfProInitialization\InitializeSystemFedrampV1Request;
use spkm\Jamf\Pro\Requests\JamfProInitialization\InitializeSystemPlatformV1Request;
use spkm\Jamf\Pro\Requests\JamfProInitialization\InitializeSystemV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-pro-initialization endpoints of the Jamf Pro API, from Jamf::jamfProInitialization().
 *
 * @extends BaseResource<Data>
 */
class JamfProInitializationResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Provide Database Password during startup: POST /v1/system/initialize-database-connection.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function initializeSystemDatabaseConnectionV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new InitializeSystemDatabaseConnectionV1Request($body, $options));
    }

    /**
     * Set up a fresh installed Jamf Pro Server for FedRAMP: POST /v1/system/fedramp-initialize.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function initializeSystemFedrampV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new InitializeSystemFedrampV1Request($body, $options));
    }

    /**
     * Set up fresh installed Jamf Pro Server for Platform: POST /v1/system/platform-initialize.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function initializeSystemPlatformV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new InitializeSystemPlatformV1Request($body, $options));
    }

    /**
     * Set up fresh installed Jamf Pro Server: POST /v1/system/initialize.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function initializeSystemV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new InitializeSystemV1Request($body, $options));
    }
}
