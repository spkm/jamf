<?php

namespace spkm\Jamf\Pro\Requests\SsoSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update the OIDC broker configuration: PUT /v3/sso/oidc-broker-config.
 *
 * Full-replacement update of the tenant's selected broker configuration's contents on the remote authentication
 * service. Omit clientSecret/privateKeyJwt to keep the currently stored value; supply either to rotate it â except
 * when this request changes clientAuthMethod, which requires the new method's credential to be supplied, because the
 * authentication service clears the credential belonging to the method being left. The configuration is always
 * written as an ADMIN_SSO capability, CONFIDENTIAL client; neither value is settable through this request.
 */
class ReplaceSsoOidcBrokerConfigV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

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
        return '/v3/sso/oidc-broker-config';
    }
}
