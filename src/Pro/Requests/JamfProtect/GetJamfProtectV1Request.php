<?php

namespace spkm\Jamf\Pro\Requests\JamfProtect;

use spkm\Jamf\Pro\Data\ProtectSettingsResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Jamf Protect integration settings: GET /v1/jamf-protect.
 */
class GetJamfProtectV1Request extends GetRequest
{
    protected ?string $dto = ProtectSettingsResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-protect';
    }
}
