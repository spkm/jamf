<?php

namespace spkm\Jamf\Pro\Requests\SelfService;

use spkm\Jamf\Pro\Data\SelfServiceSettings;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get an object representation of Self Service settings: GET /v1/self-service/settings.
 *
 * gets an object representation of Self Service settings
 */
class GetSelfServiceSettingsV1Request extends GetRequest
{
    protected ?string $dto = SelfServiceSettings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/self-service/settings';
    }
}
