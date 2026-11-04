<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\OidcDirectIdpLoginSkipUrl;
use spkm\Jamf\Pro\Data\OidcJwksResponse;
use spkm\Jamf\Pro\Data\OidcLoginDispatchResponse;
use spkm\Jamf\Pro\Data\OidcLoginDispatchResponseV2;
use spkm\Jamf\Pro\Data\OidcPublicFeaturesResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Oidc\DispatchOidcV1Request;
use spkm\Jamf\Pro\Requests\Oidc\DispatchOidcV2Request;
use spkm\Jamf\Pro\Requests\Oidc\GenerateOidcCertificateV1Request;
use spkm\Jamf\Pro\Requests\Oidc\GetOidcDirectIdpLoginUrlV1Request;
use spkm\Jamf\Pro\Requests\Oidc\GetOidcPublicFeaturesV1Request;
use spkm\Jamf\Pro\Requests\Oidc\GetOidcPublicKeyV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The oidc endpoints of the Jamf Pro API, from Jamf::oidc().
 *
 * @extends BaseResource<Data>
 */
class OidcResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Provide the url to redirect for OIDC login: POST /v1/oidc/dispatch.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-02-17.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function dispatchOidcV1(array|JsonSerializable $body, array $options = []): ?OidcLoginDispatchResponse
    {
        return $this->fetch(new DispatchOidcV1Request($body, $options));
    }

    /**
     * Provide the url to redirect for OIDC login: POST /v2/oidc/dispatch.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function dispatchOidcV2(array|JsonSerializable $body, array $options = []): ?OidcLoginDispatchResponseV2
    {
        return $this->fetch(new DispatchOidcV2Request($body, $options));
    }

    /**
     * Generate a new keystore used for signing OIDC messages: POST /v1/oidc/generate-certificate.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function generateOidcCertificateV1(array $options = []): bool
    {
        return $this->perform(new GenerateOidcCertificateV1Request($options));
    }

    /**
     * Retrieve the URL to directly login to the IdP: GET /v1/oidc/direct-idp-login-url.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getOidcDirectIdpLoginUrlV1(array $options = []): ?OidcDirectIdpLoginSkipUrl
    {
        return $this->fetch(new GetOidcDirectIdpLoginUrlV1Request($options));
    }

    /**
     * Get the public features of the OIDC configuration: GET /v1/oidc/public-features.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getOidcPublicFeaturesV1(array $options = []): ?OidcPublicFeaturesResponse
    {
        return $this->fetch(new GetOidcPublicFeaturesV1Request($options));
    }

    /**
     * Get the public key of the keystore used for signing OIDC messages as a JWT: GET /v1/oidc/public-key.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getOidcPublicKeyV1(array $options = []): ?OidcJwksResponse
    {
        return $this->fetch(new GetOidcPublicKeyV1Request($options));
    }
}
