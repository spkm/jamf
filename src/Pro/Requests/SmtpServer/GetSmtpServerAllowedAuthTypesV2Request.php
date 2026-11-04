<?php

namespace spkm\Jamf\Pro\Requests\SmtpServer;

use spkm\Jamf\Pro\Data\SmtpAuthenticationTypeList;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get allowed SMTP authentication types: GET /v2/smtp-server/allowed-auth-types.
 *
 * Returns the list of authentication types currently available on this instance. Availability is controlled at the
 * instance or knobs level and is independent of current SMTP settings.
 */
class GetSmtpServerAllowedAuthTypesV2Request extends GetRequest
{
    protected ?string $dto = SmtpAuthenticationTypeList::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/smtp-server/allowed-auth-types';
    }
}
