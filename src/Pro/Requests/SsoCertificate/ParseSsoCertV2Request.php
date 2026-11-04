<?php

namespace spkm\Jamf\Pro\Requests\SsoCertificate;

use JsonSerializable;
use spkm\Jamf\Pro\Data\SsoKeystoreCertParseResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Parse the certificate to get details about certificate type and keys needed to upload certificate file: POST /v2/sso/cert/parse.
 */
class ParseSsoCertV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = SsoKeystoreCertParseResponse::class;

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
        return '/v2/sso/cert/parse';
    }
}
