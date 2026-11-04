<?php

namespace spkm\Jamf\Pro\Requests\JamfProVersion;

use spkm\Jamf\Pro\Data\JamfProVersion;
use spkm\Jamf\Requests\GetRequest;

/**
 * Return information about the Jamf Pro including the current version: GET /v1/jamf-pro-version.
 *
 * Returns information about the Jamf Pro including the current version.
 */
class GetJamfProVersionV1Request extends GetRequest
{
    protected ?string $dto = JamfProVersion::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-pro-version';
    }
}
