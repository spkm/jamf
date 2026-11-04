<?php

namespace spkm\Jamf\Pro\Requests\SsoCertificate;

use spkm\Jamf\Pro\Data\SsoKeystoreResponseWithDetails;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the certificate currently configured for use with SSO: GET /v2/sso/cert.
 *
 * Retrieves the certificate currently configured for use with SSO.
 */
class GetSsoCertV2Request extends GetRequest
{
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
