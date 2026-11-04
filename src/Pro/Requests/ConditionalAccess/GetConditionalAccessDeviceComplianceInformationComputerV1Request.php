<?php

namespace spkm\Jamf\Pro\Requests\ConditionalAccess;

use spkm\Jamf\Pro\Data\DeviceComplianceInformation;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get compliance information for a single computer device: GET /v1/conditional-access/device-compliance-information/computer/{deviceId}.
 *
 * Return basic compliance information for the given computer device
 */
class GetConditionalAccessDeviceComplianceInformationComputerV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = DeviceComplianceInformation::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $deviceId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/conditional-access/device-compliance-information/computer/'.Path::segment((string) $this->deviceId);
    }
}
