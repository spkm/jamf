<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV3;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Mobile Device Prestage: PUT /v3/mobile-device-prestages/{id}.
 *
 * Updates a Mobile Device Prestage
 */
class ReplaceMobileDevicePrestageV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = GetMobileDevicePrestageV3::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/mobile-device-prestages/'.Path::segment((string) $this->id);
    }
}
