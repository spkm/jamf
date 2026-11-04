<?php

namespace spkm\Jamf\Pro\Requests\ApnsClientPushStatus;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Enable push notifications for a single client: POST /v1/apns-client-push-status/enable-client.
 *
 * Enable push notifications for a single MDM client that previously had push disabled. This sets the pushEnabled flag
 * to true for the specified client. managementId field is required in the request body.
 */
class EnableApnsClientPushStatusClientV1Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

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
        return '/v1/apns-client-push-status/enable-client';
    }
}
