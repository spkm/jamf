<?php

namespace spkm\Jamf\Pro\Requests\Mdm;

use JsonSerializable;
use spkm\Jamf\Pro\Data\BlankPushResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Send blank push notifications to a list of client management IDs: POST /v2/mdm/blank-push.
 *
 * Accepts a list of client management IDs and sends a blank push notification to each. Returns a list of UUIDs that
 * encountered errors.
 */
class CreateMdmBlankPushV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = BlankPushResponse::class;

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
        return '/v2/mdm/blank-push';
    }
}
