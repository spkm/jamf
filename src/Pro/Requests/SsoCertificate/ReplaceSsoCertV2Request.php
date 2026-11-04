<?php

namespace spkm\Jamf\Pro\Requests\SsoCertificate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\SsoKeystoreResponseWithDetails;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update the certificate used by Jamf Pro to sign SSO requests to the identify provider: PUT /v2/sso/cert.
 */
class ReplaceSsoCertV2Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = SsoKeystoreResponseWithDetails::class;

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
        return '/v2/sso/cert';
    }
}
