<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\EnrollmentCustomizationDependencies;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\OidcBrokerConfig;
use spkm\Jamf\Pro\Data\SsoSettingsV3;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SsoSettings\CreateSsoHistoryV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\DisableSsoV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoDependenciesV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoHistoryV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoMetadataDownloadV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoOidcBrokerConfigV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\ReplaceSsoOidcBrokerConfigV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\ReplaceSsoV3Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The sso-settings endpoints of the Jamf Pro API, from Jamf::ssoSettings().
 *
 * @extends Builder<ObjectHistory>
 */
class SsoSettingsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSsoHistoryV3Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateSsoHistoryV3Request($body);
    }

    /**
     * Add SSO history object notes: POST /v3/sso/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSsoHistoryV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateSsoHistoryV3Request($body, $options));
    }

    /**
     * Disable SSO: POST /v3/sso/disable.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function disableSsoV3(array $options = []): bool
    {
        return $this->perform(new DisableSsoV3Request($options));
    }

    /**
     * Retrieve the list of Enrollment Customizations using SSO: GET /v3/sso/dependencies.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSsoDependenciesV3(array $options = []): ?EnrollmentCustomizationDependencies
    {
        return $this->fetch(new GetSsoDependenciesV3Request($options));
    }

    /**
     * Get SSO history object: GET /v3/sso/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getSsoHistoryV3(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetSsoHistoryV3Request($query));
    }

    /**
     * Download the Jamf Pro SAML metadata file: GET /v3/sso/metadata/download.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSsoMetadataDownloadV3(array $options = []): ?string
    {
        return $this->fetch(new GetSsoMetadataDownloadV3Request($options));
    }

    /**
     * Get the OIDC broker configuration: GET /v3/sso/oidc-broker-config.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSsoOidcBrokerConfigV3(array $options = []): ?OidcBrokerConfig
    {
        return $this->fetch(new GetSsoOidcBrokerConfigV3Request($options));
    }

    /**
     * Retrieve the current Single Sign On configuration settings: GET /v3/sso.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSsoV3(array $options = []): ?SsoSettingsV3
    {
        return $this->fetch(new GetSsoV3Request($options));
    }

    /**
     * Update the OIDC broker configuration: PUT /v3/sso/oidc-broker-config.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSsoOidcBrokerConfigV3(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new ReplaceSsoOidcBrokerConfigV3Request($body, $options));
    }

    /**
     * Updates the current Single Sign On configuration settings: PUT /v3/sso.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSsoV3(array|JsonSerializable $body = [], array $options = []): ?SsoSettingsV3
    {
        return $this->fetch(new ReplaceSsoV3Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
