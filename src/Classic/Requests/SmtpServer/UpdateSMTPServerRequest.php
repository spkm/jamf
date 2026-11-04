<?php

namespace spkm\Jamf\Classic\Requests\SmtpServer;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;

/**
 * Updates the Jamf Pro smtp server information: PUT /smtpserver.
 *
 * Password can be changed via the element. Password should be clear text and sent over SSL.
 */
class UpdateSMTPServerRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'smtp_server';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <smtp_server>), or the XML itself.
     */
    public function __construct(array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/smtpserver';
    }
}
