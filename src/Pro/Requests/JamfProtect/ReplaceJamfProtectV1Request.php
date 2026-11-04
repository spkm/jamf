<?php

namespace spkm\Jamf\Pro\Requests\JamfProtect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\ProtectSettingsResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Jamf Protect integration settings: PUT /v1/jamf-protect.
 */
class ReplaceJamfProtectV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ProtectSettingsResponse::class;

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
        return '/v1/jamf-protect';
    }
}
