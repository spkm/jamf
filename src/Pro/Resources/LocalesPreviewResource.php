<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\Locale;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\LocalesPreview\GetLocalesV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The locales-preview endpoints of the Jamf Pro API, from Jamf::localesPreview().
 *
 * @extends BaseResource<Data>
 */
class LocalesPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Return locales that can be used in other features: GET /v1/locales.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, Locale>
     */
    public function getLocalesV1(array $options = []): Collection
    {
        return $this->fetch(new GetLocalesV1Request($options));
    }
}
