<?php

namespace spkm\Jamf\Pro\Requests\JamfProtect;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ProtectSettingsResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Register a Jamf Protect API configuration with Jamf Pro: POST /v1/jamf-protect/register.
 */
class CreateJamfProtectRegisterV1Request extends WriteRequest
{
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
        return '/v1/jamf-protect/register';
    }
}
