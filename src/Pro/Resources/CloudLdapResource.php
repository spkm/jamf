<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\CloudLdapConnectionPoolStatistics;
use spkm\Jamf\Pro\Data\CloudLdapConnectionStatus;
use spkm\Jamf\Pro\Data\CloudLdapKeystore;
use spkm\Jamf\Pro\Data\CloudLdapMappingsResponse;
use spkm\Jamf\Pro\Data\CloudLdapServerResponse;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\LdapConfigurationResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\CloudLdap\CreateCloudLdapsV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\DeleteCloudLdapV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapConnectionBindV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapConnectionSearchV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapConnectionStatusV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapMappingsV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapsDefaultMappingsV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapsDefaultServerConfigurationV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\ReplaceCloudLdapMappingsV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\ReplaceCloudLdapV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\VerifyLdapKeystoreV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The cloud-ldap endpoints of the Jamf Pro API, from Jamf::cloudLdap().
 *
 * @extends BaseResource<Data>
 */
class CloudLdapResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create Cloud Identity Provider configuration: POST /v2/cloud-ldaps.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCloudLdapsV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateCloudLdapsV2Request($body, $options));
    }

    /**
     * Delete Cloud Identity Provider configuration: DELETE /v2/cloud-ldaps/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteCloudLdapV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteCloudLdapV2Request($id, $options));
    }

    /**
     * Get bind connection pool statistics: GET /v2/cloud-ldaps/{id}/connection/bind.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudLdapConnectionBindV2(int|string $id, array $options = []): ?CloudLdapConnectionPoolStatistics
    {
        return $this->fetch(new GetCloudLdapConnectionBindV2Request($id, $options));
    }

    /**
     * Get search connection pool statistics: GET /v2/cloud-ldaps/{id}/connection/search.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudLdapConnectionSearchV2(int|string $id, array $options = []): ?CloudLdapConnectionPoolStatistics
    {
        return $this->fetch(new GetCloudLdapConnectionSearchV2Request($id, $options));
    }

    /**
     * Tests the communication with the specified cloud connection: GET /v2/cloud-ldaps/{id}/connection/status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudLdapConnectionStatusV2(int|string $id, array $options = []): ?CloudLdapConnectionStatus
    {
        return $this->fetch(new GetCloudLdapConnectionStatusV2Request($id, $options));
    }

    /**
     * Get mappings configurations for Cloud Identity Providers server configuration: GET
     * /v2/cloud-ldaps/{id}/mappings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudLdapMappingsV2(int|string $id, array $options = []): ?CloudLdapMappingsResponse
    {
        return $this->fetch(new GetCloudLdapMappingsV2Request($id, $options));
    }

    /**
     * Get Cloud Identity Provider configuration with given id: GET /v2/cloud-ldaps/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudLdapV2(int|string $id, array $options = []): ?LdapConfigurationResponse
    {
        return $this->fetch(new GetCloudLdapV2Request($id, $options));
    }

    /**
     * Get default mappings: GET /v2/cloud-ldaps/defaults/{provider}/mappings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudLdapsDefaultMappingsV2(string $provider, array $options = []): ?CloudLdapMappingsResponse
    {
        return $this->fetch(new GetCloudLdapsDefaultMappingsV2Request($provider, $options));
    }

    /**
     * Get default server configuration: GET /v2/cloud-ldaps/defaults/{provider}/server-configuration.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudLdapsDefaultServerConfigurationV2(string $provider, array $options = []): ?CloudLdapServerResponse
    {
        return $this->fetch(new GetCloudLdapsDefaultServerConfigurationV2Request($provider, $options));
    }

    /**
     * Update Cloud Identity Provider mappings configuration: PUT /v2/cloud-ldaps/{id}/mappings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceCloudLdapMappingsV2(int|string $id, array|JsonSerializable $body, array $options = []): ?CloudLdapMappingsResponse
    {
        return $this->fetch(new ReplaceCloudLdapMappingsV2Request($id, $body, $options));
    }

    /**
     * Update Cloud Identity Provider configuration: PUT /v2/cloud-ldaps/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceCloudLdapV2(int|string $id, array|JsonSerializable $body, array $options = []): ?LdapConfigurationResponse
    {
        return $this->fetch(new ReplaceCloudLdapV2Request($id, $body, $options));
    }

    /**
     * Validate keystore for Cloud Identity Provider secure connection: POST /v1/ldap-keystore/verify.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function verifyLdapKeystoreV1(array|JsonSerializable $body, array $options = []): ?CloudLdapKeystore
    {
        return $this->fetch(new VerifyLdapKeystoreV1Request($body, $options));
    }
}
