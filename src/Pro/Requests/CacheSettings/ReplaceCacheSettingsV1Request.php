<?php

namespace spkm\Jamf\Pro\Requests\CacheSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\CacheSettings;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Cache Settings: PUT /v1/cache-settings.
 *
 * updates cache settings
 */
class ReplaceCacheSettingsV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = CacheSettings::class;

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
        return '/v1/cache-settings';
    }
}
