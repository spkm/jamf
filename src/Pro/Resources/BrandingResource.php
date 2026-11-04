<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Branding\GetBrandingImagesDownloadV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The branding endpoints of the Jamf Pro API, from Jamf::branding().
 *
 * @extends BaseResource<Data>
 */
class BrandingResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Download a self service branding image: GET /v1/branding-images/download/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getBrandingImagesDownloadV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetBrandingImagesDownloadV1Request($id, $options));
    }
}
