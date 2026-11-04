<?php

namespace spkm\Jamf\Pro\Requests\Oidc;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Generate a new keystore used for signing OIDC messages: POST /v1/oidc/generate-certificate.
 *
 * Generates a new certificate used for signing OIDC messages
 */
class GenerateOidcCertificateV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/oidc/generate-certificate';
    }
}
