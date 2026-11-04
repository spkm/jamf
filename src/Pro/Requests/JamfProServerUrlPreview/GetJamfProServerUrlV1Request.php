<?php

namespace spkm\Jamf\Pro\Requests\JamfProServerUrlPreview;

use spkm\Jamf\Pro\Data\JamfProServerUrl;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Jamf Pro Server URL settings: GET /v1/jamf-pro-server-url.
 */
class GetJamfProServerUrlV1Request extends GetRequest
{
    protected ?string $dto = JamfProServerUrl::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-pro-server-url';
    }
}
