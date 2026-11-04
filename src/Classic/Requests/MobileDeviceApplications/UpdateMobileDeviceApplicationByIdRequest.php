<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceApplications;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing mobile device application by id: PUT /mobiledeviceapplications/id/{id}.
 *
 * and are redundant. App configuration preferences should be listed using character entities, e.g.
 * &lt;dict&gt;&lt;key&gt;abc&lt;/key&gt;&lt;string&gt;xyz&lt;/string&gt;&lt;/dict&gt;
 */
class UpdateMobileDeviceApplicationByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'mobile_device_application';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_application>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceapplications/id/'.Path::segment((string) $this->id);
    }
}
