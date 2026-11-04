<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\TomcatSettingsPreview\IssueSettingsTomcatSslCertificateRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The tomcat-settings-preview endpoints of the Jamf Pro API, from Jamf::tomcatSettingsPreview().
 *
 * @extends BaseResource<Data>
 */
class TomcatSettingsPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Generate a SSL Certificate using Jamf Certificate Authority: POST /settings/issueTomcatSslCertificate.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function issueSettingsTomcatSslCertificate(array $options = []): bool
    {
        return $this->perform(new IssueSettingsTomcatSslCertificateRequest($options));
    }
}
