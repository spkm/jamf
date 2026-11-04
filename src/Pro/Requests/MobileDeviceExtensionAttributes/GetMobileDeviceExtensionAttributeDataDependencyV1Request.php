<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get smart group dependent object for a specified mobile device extension attribute: GET /v1/mobile-device-extension-attributes/{id}/data-dependency.
 */
class GetMobileDeviceExtensionAttributeDataDependencyV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-device-extension-attributes/'.Path::segment((string) $this->id).'/data-dependency';
    }
}
