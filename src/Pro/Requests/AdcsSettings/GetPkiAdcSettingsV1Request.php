<?php

namespace spkm\Jamf\Pro\Requests\AdcsSettings;

use spkm\Jamf\Pro\Data\AdcsSettingsResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get AD CS Settings configuration for the ID value: GET /v1/pki/adcs-settings/{id}.
 */
class GetPkiAdcSettingsV1Request extends GetRequest
{
    protected ?string $dto = AdcsSettingsResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/adcs-settings/'.Path::segment((string) $this->id);
    }
}
