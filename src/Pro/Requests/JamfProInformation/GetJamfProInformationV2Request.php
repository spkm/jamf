<?php

namespace spkm\Jamf\Pro\Requests\JamfProInformation;

use spkm\Jamf\Pro\Data\JamfProInformationV2;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get basic information about the Jamf Pro Server: GET /v2/jamf-pro-information.
 */
class GetJamfProInformationV2Request extends GetRequest
{
    protected ?string $dto = JamfProInformationV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/jamf-pro-information';
    }
}
