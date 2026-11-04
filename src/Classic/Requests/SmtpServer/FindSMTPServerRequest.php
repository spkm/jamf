<?php

namespace spkm\Jamf\Classic\Requests\SmtpServer;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds the Jamf Pro smtp server information: GET /smtpserver.
 */
class FindSMTPServerRequest extends ClassicGetRequest
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
        return '/smtpserver';
    }
}
