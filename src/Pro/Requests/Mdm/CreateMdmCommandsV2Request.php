<?php

namespace spkm\Jamf\Pro\Requests\Mdm;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Post a command for creation and queuing: POST /v2/mdm/commands.
 *
 * Provided an MDM command type and appropriate information, will create and then queue said command. A separate
 * privilege is required for each device type and MDM command you want to view or send.
 */
class CreateMdmCommandsV2Request extends WriteRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = HrefResponse::class;

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
        return '/v2/mdm/commands';
    }
}
