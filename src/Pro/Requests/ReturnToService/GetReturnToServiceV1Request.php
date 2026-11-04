<?php

namespace spkm\Jamf\Pro\Requests\ReturnToService;

use spkm\Jamf\Pro\Data\ReturnToServiceConfiguration;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get all Return to Service Configurations: GET /v1/return-to-service.
 *
 * Gets all return to service configurations.
 */
class GetReturnToServiceV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = ReturnToServiceConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/return-to-service';
    }
}
