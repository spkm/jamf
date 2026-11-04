<?php

namespace spkm\Jamf\Pro\Requests\JamfProUserAccountSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Persist the user setting: PUT /v1/user/preferences/{keyId}.
 *
 * Persists the user setting
 */
class ReplaceUserPreferenceV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $keyId, array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/user/preferences/'.Path::segment((string) $this->keyId);
    }
}
