<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Add Mobile Device Prestage history object notes: POST /v2/mobile-device-prestages/{id}/history.
 *
 * Adds mobile device prestage history object notes
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class CreateMobileDevicePrestageHistoryV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

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
        return '/v2/mobile-device-prestages/'.Path::segment((string) $this->id).'/history';
    }
}
