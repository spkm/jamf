<?php

namespace spkm\Jamf\Pro\Requests\CacheSettings;

use spkm\Jamf\Pro\Data\CacheSettings;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Cache Settings: GET /v1/cache-settings.
 *
 * gets cache settings
 */
class GetCacheSettingsV1Request extends GetRequest
{
    protected ?string $dto = CacheSettings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cache-settings';
    }
}
