<?php

namespace spkm\Jamf\Pro\Requests\AppRequestPreview;

use spkm\Jamf\Pro\Data\AppRequestSettings;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Applicastion Request Settings: GET /v1/app-request/settings.
 *
 * Get app request settings
 */
class GetAppRequestSettingsV1Request extends GetRequest
{
    protected ?string $dto = AppRequestSettings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/app-request/settings';
    }
}
