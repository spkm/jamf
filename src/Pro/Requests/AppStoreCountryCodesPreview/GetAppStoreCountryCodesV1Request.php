<?php

namespace spkm\Jamf\Pro\Requests\AppStoreCountryCodesPreview;

use spkm\Jamf\Pro\Data\CountryCodes;
use spkm\Jamf\Requests\GetRequest;

/**
 * Return a list of Countries and the associated Codes: GET /v1/app-store-country-codes.
 *
 * Returns a list of countries and the associated codes that can be use for the App Store locale
 */
class GetAppStoreCountryCodesV1Request extends GetRequest
{
    protected ?string $dto = CountryCodes::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/app-store-country-codes';
    }
}
