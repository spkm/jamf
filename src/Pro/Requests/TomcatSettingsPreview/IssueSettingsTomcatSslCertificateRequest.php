<?php

namespace spkm\Jamf\Pro\Requests\TomcatSettingsPreview;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Generate a SSL Certificate using Jamf Certificate Authority: POST /settings/issueTomcatSslCertificate.
 *
 * generate a SSL Certificate using Jamf Certificate Authority
 */
class IssueSettingsTomcatSslCertificateRequest extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/settings/issueTomcatSslCertificate';
    }
}
