<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SmtpServerV2 record from the Jamf Pro API.
 */
readonly class SmtpServerV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $enabled = null,
        /** The authentication type to use for the SMTP server. Note that NONE and BASIC may not be available depending on the server configuration. Check allowedAuthenticationTypes for the list of currently... */
        public ?string $authenticationType = null,
        public ?SmtpConnectionSettings $connectionSettings = null,
        public ?SmtpSenderSettings $senderSettings = null,
        public ?SmtpBasicCredentials $basicAuthCredentials = null,
        public ?SmtpGraphApiCredentials $graphApiCredentials = null,
        public ?SmtpGoogleMailCredentials $googleMailCredentials = null,
        public array $extra = [],
    ) {}
}
