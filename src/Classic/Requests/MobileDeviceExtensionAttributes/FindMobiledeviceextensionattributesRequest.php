<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all mobile device extension attributes: GET /mobiledeviceextensionattributes.
 */
class FindMobiledeviceextensionattributesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceextensionattributes';
    }
}
