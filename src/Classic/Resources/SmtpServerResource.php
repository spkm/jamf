<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\SmtpServer\FindSMTPServerRequest;
use spkm\Jamf\Classic\Requests\SmtpServer\UpdateSMTPServerRequest;

/**
 * The smtpserver endpoints of the Classic API, from Jamf::classic()->smtpServer().
 */
class SmtpServerResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindSMTPServerRequest;
    }

    /**
     * Finds the Jamf Pro smtp server information: GET /smtpserver.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findSMTPServer(array $options = []): Collection
    {
        return $this->fetch(new FindSMTPServerRequest($options));
    }

    /**
     * Updates the Jamf Pro smtp server information: PUT /smtpserver.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <smtp_server>), or the XML itself.
     */
    public function updateSMTPServer(array|string $record = []): mixed
    {
        return $this->fetch(new UpdateSMTPServerRequest($record));
    }
}
