<?php

namespace spkm\Jamf\Pro\Requests\AdcsSettings;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete AD CS Settings configuration by ID: DELETE /v1/pki/adcs-settings/{id}.
 *
 * Delete AD CS Settings configuration, only if reassignment of Certificate Authority succeeds and no config profiles
 * are using the configuration.
 */
class DeletePkiAdcSettingsV1Request extends DeleteRequest
{
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
