<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceApplications;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device application by id: POST /mobiledeviceapplications/id/{id}.
 *
 * refers to the option to automatically update app information. App configuration preferences should be listed using
 * character entities, e.g. &lt;dict&gt;&lt;key&gt;JSS_ID&lt;/key&gt;&lt;string&gt;313&lt;/string&gt;&lt;/dict&gt;
 */
class CreateMobileDeviceApplicationByIdRequest extends ClassicWriteRequest
{
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
