<?php

namespace spkm\Jamf\Pro\Requests\ApnsClientPushStatus;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Enable push notifications for all clients: POST /v1/apns-client-push-status/enable-all-clients.
 *
 * Create a request to enable push notifications for all MDM clients that currently have push disabled. This is an
 * asynchronous operation that processes all disabled clients in the background.
 */
class EnableApnsClientPushStatusAllClientsV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/apns-client-push-status/enable-all-clients';
    }
}
