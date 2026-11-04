<?php

namespace spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos;

use spkm\Jamf\Pro\Data\MacOsBrandingConfiguration;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Read a single Self Service macOS branding configuration indicated by the provided id: GET /v1/self-service/branding/macos/{id}.
 */
class GetSelfServiceBrandingMacosByIdV1Request extends GetRequest
{
    protected ?string $dto = MacOsBrandingConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/self-service/branding/macos/'.Path::segment((string) $this->id);
    }
}
