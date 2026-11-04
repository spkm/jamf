<?php

namespace spkm\Jamf\Pro\Requests\MobileDevices;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\MobileDeviceDetailsV2;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update fields on a mobile device that are allowed to be modified by users: PATCH /v2/mobile-devices/{id}.
 *
 * Updates fields on a mobile device that are allowed to be modified by users.
 */
class UpdateMobileDeviceV2Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::ONE;

    protected ?string $dto = MobileDeviceDetailsV2::class;

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
        return '/v2/mobile-devices/'.Path::segment((string) $this->id);
    }
}
