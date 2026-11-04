<?php

namespace spkm\Jamf\Pro\Requests\SelfServiceBrandingIos;

use spkm\Jamf\Pro\Data\IosBrandingConfiguration;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Read a single Self Service iOS branding configuration indicated by the provided id: GET /v1/self-service/branding/ios/{id}.
 */
class GetSelfServiceBrandingIosByIdV1Request extends GetRequest
{
    protected ?string $dto = IosBrandingConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/self-service/branding/ios/'.Path::segment((string) $this->id);
    }
}
