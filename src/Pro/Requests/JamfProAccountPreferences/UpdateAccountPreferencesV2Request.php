<?php

namespace spkm\Jamf\Pro\Requests\JamfProAccountPreferences;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\AccountPreferencesV5;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Jamf Pro account preferences: PATCH /v2/account-preferences.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class UpdateAccountPreferencesV2Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::ONE;

    protected ?string $dto = AccountPreferencesV5::class;

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
        return '/v2/account-preferences';
    }
}
