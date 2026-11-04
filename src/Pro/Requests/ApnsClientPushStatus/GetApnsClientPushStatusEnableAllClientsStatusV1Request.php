<?php

namespace spkm\Jamf\Pro\Requests\ApnsClientPushStatus;

use spkm\Jamf\Pro\Data\ApnsPushEnableRequest;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get status of enable all clients request: GET /v1/apns-client-push-status/enable-all-clients/status.
 *
 * Retrieve the status of the most recent request to enable push notifications for all clients. Returns 404 if no
 * recent request exists.
 */
class GetApnsClientPushStatusEnableAllClientsStatusV1Request extends GetRequest
{
    protected ?string $dto = ApnsPushEnableRequest::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/apns-client-push-status/enable-all-clients/status';
    }
}
