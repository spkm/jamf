<?php

namespace spkm\Jamf\Pro\Requests\SmtpServer;

use spkm\Jamf\Pro\Data\SmtpServerV2;
use spkm\Jamf\Requests\GetRequest;

/**
 * Finds the Jamf Pro SMTP Server information: GET /v2/smtp-server.
 */
class GetSmtpServerV2Request extends GetRequest
{
    protected ?string $dto = SmtpServerV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/smtp-server';
    }
}
