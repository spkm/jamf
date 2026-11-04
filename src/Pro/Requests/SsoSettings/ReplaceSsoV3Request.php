<?php

namespace spkm\Jamf\Pro\Requests\SsoSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\SsoSettingsV3;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Updates the current Single Sign On configuration settings: PUT /v3/sso.
 */
class ReplaceSsoV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = SsoSettingsV3::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/sso';
    }
}
