<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\CacheSettings;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\CacheSettings\GetCacheSettingsV1Request;
use spkm\Jamf\Pro\Requests\CacheSettings\ReplaceCacheSettingsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The cache-settings endpoints of the Jamf Pro API, from Jamf::cacheSettings().
 *
 * @extends BaseResource<Data>
 */
class CacheSettingsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get Cache Settings: GET /v1/cache-settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCacheSettingsV1(array $options = []): ?CacheSettings
    {
        return $this->fetch(new GetCacheSettingsV1Request($options));
    }

    /**
     * Update Cache Settings: PUT /v1/cache-settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceCacheSettingsV1(array|JsonSerializable $body, array $options = []): ?CacheSettings
    {
        return $this->fetch(new ReplaceCacheSettingsV1Request($body, $options));
    }
}
