<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\SsoKeystoreCertParseResponse;
use spkm\Jamf\Pro\Data\SsoKeystoreResponseWithDetails;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SsoCertificate\CreateSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\DeleteSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\GetSsoCertDownloadV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\GetSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\ParseSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\ReplaceSsoCertV2Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The sso-certificate endpoints of the Jamf Pro API, from Jamf::ssoCertificate().
 *
 * @extends BaseResource<Data>
 */
class SsoCertificateResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Jamf Pro will generate a new certificate and use it to sign SSO: POST /v2/sso/cert.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSsoCertV2(array $options = []): ?SsoKeystoreResponseWithDetails
    {
        return $this->fetch(new CreateSsoCertV2Request($options));
    }

    /**
     * Delete the currently configured certificate used by SSO: DELETE /v2/sso/cert.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteSsoCertV2(array $options = []): bool
    {
        return $this->perform(new DeleteSsoCertV2Request($options));
    }

    /**
     * Download the certificate currently configured for use with Jamf Pro's SSO configuration: GET
     * /v2/sso/cert/download.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSsoCertDownloadV2(array $options = []): ?string
    {
        return $this->fetch(new GetSsoCertDownloadV2Request($options));
    }

    /**
     * Retrieve the certificate currently configured for use with SSO: GET /v2/sso/cert.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSsoCertV2(array $options = []): ?SsoKeystoreResponseWithDetails
    {
        return $this->fetch(new GetSsoCertV2Request($options));
    }

    /**
     * Parse the certificate to get details about certificate type and keys needed to upload certificate file: POST
     * /v2/sso/cert/parse.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function parseSsoCertV2(array|JsonSerializable $body, array $options = []): ?SsoKeystoreCertParseResponse
    {
        return $this->fetch(new ParseSsoCertV2Request($body, $options));
    }

    /**
     * Update the certificate used by Jamf Pro to sign SSO requests to the identify provider: PUT /v2/sso/cert.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSsoCertV2(array|JsonSerializable $body, array $options = []): ?SsoKeystoreResponseWithDetails
    {
        return $this->fetch(new ReplaceSsoCertV2Request($body, $options));
    }
}
