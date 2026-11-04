<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\BrandingImageUrl;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingPreview\CreateSelfServiceBrandingImagesRequest;
use spkm\Jamf\Resources\BaseResource;
use SplFileInfo;

/**
 * The self-service-branding-preview endpoints of the Jamf Pro API, from Jamf::selfServiceBrandingPreview().
 *
 * @extends BaseResource<Data>
 */
class SelfServiceBrandingPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Upload an image: POST /self-service/branding/images.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSelfServiceBrandingImages(mixed $file, ?string $filename = null, array $options = []): ?BrandingImageUrl
    {
        return $this->fetch(new CreateSelfServiceBrandingImagesRequest($file, $filename, $options));
    }
}
