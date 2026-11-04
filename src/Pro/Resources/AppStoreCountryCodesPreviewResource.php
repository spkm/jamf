<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\CountryCodes;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\AppStoreCountryCodesPreview\GetAppStoreCountryCodesV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The app-store-country-codes-preview endpoints of the Jamf Pro API, from Jamf::appStoreCountryCodesPreview().
 *
 * @extends BaseResource<Data>
 */
class AppStoreCountryCodesPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Return a list of Countries and the associated Codes: GET /v1/app-store-country-codes.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAppStoreCountryCodesV1(array $options = []): ?CountryCodes
    {
        return $this->fetch(new GetAppStoreCountryCodesV1Request($options));
    }
}
