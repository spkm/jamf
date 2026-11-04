<?php

namespace spkm\Jamf\Pro\Requests\SelfServicePlus;

use spkm\Jamf\Pro\Data\SelfServicePlusSettings;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Self Service Plus settings: GET /v1/self-service-plus/settings.
 */
class GetSelfServicePlusSettingsV1Request extends GetRequest
{
    protected ?string $dto = SelfServicePlusSettings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/self-service-plus/settings';
    }
}
