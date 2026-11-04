<?php

namespace spkm\Jamf\Pro\Requests\JamfRemoteAssist;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Export Jamf Remote Assist sessions history: POST /v2/jamf-remote-assist/session/export.
 */
class ExportJamfRemoteAssistSessionV2Request extends WriteRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'text/csv';

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/jamf-remote-assist/session/export';
    }
}
