<?php

namespace spkm\Jamf\Pro\Requests\CloudInformation;

use spkm\Jamf\Pro\Data\CloudResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve information related to cloud setup: GET /v1/cloud-information.
 */
class GetCloudInformationV1Request extends GetRequest
{
    protected ?string $dto = CloudResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-information';
    }
}
