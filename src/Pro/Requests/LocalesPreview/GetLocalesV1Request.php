<?php

namespace spkm\Jamf\Pro\Requests\LocalesPreview;

use spkm\Jamf\Pro\Data\Locale;
use spkm\Jamf\Requests\GetRequest;

/**
 * Return locales that can be used in other features: GET /v1/locales.
 *
 * Returns locales that can be used in other features.
 */
class GetLocalesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = Locale::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/locales';
    }
}
