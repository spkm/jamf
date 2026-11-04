<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a Mobile Device Extension Attribute by ID: DELETE /v1/mobile-device-extension-attributes/{id}.
 *
 * Deletes the Mobile Device Extension Attribute identified by the provided ID. In addition to removing the attribute
 * itself, this operation will also delete any related dependent data, including: - Associated popup menu choices. -
 * Fields used in saved search displays. - User preferences that reference the attribute.
 */
class DeleteMobileDeviceExtensionAttributeV1Request extends DeleteRequest
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
        return '/v1/mobile-device-extension-attributes/'.Path::segment((string) $this->id);
    }
}
