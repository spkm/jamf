<?php

namespace spkm\Jamf\Pro\Requests\SsoCertificate;

use spkm\Jamf\Requests\GetRequest;

/**
 * Download the certificate currently configured for use with Jamf Pro's SSO configuration: GET /v2/sso/cert/download.
 *
 * Downloads the certificate currently configured for use with Jamf Pro's SSO configuration
 */
class GetSsoCertDownloadV2Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'text/plain';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/sso/cert/download';
    }
}
