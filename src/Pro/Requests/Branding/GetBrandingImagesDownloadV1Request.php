<?php

namespace spkm\Jamf\Pro\Requests\Branding;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Download a self service branding image: GET /v1/branding-images/download/{id}.
 */
class GetBrandingImagesDownloadV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'image/*';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/branding-images/download/'.Path::segment((string) $this->id);
    }
}
