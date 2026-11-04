<?php

namespace spkm\Jamf\Pro\Requests\SsoCertificate;

use spkm\Jamf\Pro\Data\SsoKeystoreResponseWithDetails;
use spkm\Jamf\Requests\ActionRequest;

/**
 * Jamf Pro will generate a new certificate and use it to sign SSO: POST /v2/sso/cert.
 */
class CreateSsoCertV2Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = SsoKeystoreResponseWithDetails::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/sso/cert';
    }
}
