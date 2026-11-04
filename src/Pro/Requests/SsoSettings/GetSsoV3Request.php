<?php

namespace spkm\Jamf\Pro\Requests\SsoSettings;

use spkm\Jamf\Pro\Data\SsoSettingsV3;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the current Single Sign On configuration settings: GET /v3/sso.
 *
 * Retrieves the current Single Sign On configuration settings
 */
class GetSsoV3Request extends GetRequest
{
    protected ?string $dto = SsoSettingsV3::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/sso';
    }
}
