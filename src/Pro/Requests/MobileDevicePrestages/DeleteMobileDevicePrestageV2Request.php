<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a Mobile Device Prestage with the supplied id: DELETE /v2/mobile-device-prestages/{id}.
 *
 * Deletes a Mobile Device Prestage with the supplied id
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class DeleteMobileDevicePrestageV2Request extends DeleteRequest
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
        return '/v2/mobile-device-prestages/'.Path::segment((string) $this->id);
    }
}
