<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use spkm\Jamf\Pro\Data\CloudDistributionPointTestConnection;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the cloud distribution point test connection details: GET /v1/cloud-distribution-point/test-connection.
 *
 * Verifies the connection to the cloud distribution point after updating its configuration. This endpoint returns the
 * connection status and a message indicating whether the connection is successful or failed.
 */
class GetCloudDistributionPointTestConnectionV1Request extends GetRequest
{
    protected ?string $dto = CloudDistributionPointTestConnection::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-distribution-point/test-connection';
    }
}
