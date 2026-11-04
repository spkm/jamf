<?php

namespace spkm\Jamf\Pro\Requests\MacosManagedSoftwareUpdates;

use JsonSerializable;
use spkm\Jamf\Pro\Data\MacOsManagedSoftwareUpdateResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Send MacOs Managed Software Updates: POST /v1/macos-managed-software-updates/send-updates.
 *
 * Sends MacOs Managed Software Updates
 *
 * @deprecated Jamf deprecated this endpoint on 2022-10-17.
 */
class SendMacosManagedSoftwareUpdatesUpdatesV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = MacOsManagedSoftwareUpdateResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/macos-managed-software-updates/send-updates';
    }
}
