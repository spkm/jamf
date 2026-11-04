<?php

namespace spkm\Jamf\Pro\Requests\SsoSettings;

use spkm\Jamf\Requests\GetRequest;

/**
 * Download the Jamf Pro SAML metadata file: GET /v3/sso/metadata/download.
 */
class GetSsoMetadataDownloadV3Request extends GetRequest
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
        return '/v3/sso/metadata/download';
    }
}
