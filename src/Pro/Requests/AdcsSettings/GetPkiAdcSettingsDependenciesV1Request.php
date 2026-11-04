<?php

namespace spkm\Jamf\Pro\Requests\AdcsSettings;

use spkm\Jamf\Pro\Data\AdcsDependency;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve list of AD CS Settings dependencies: GET /v1/pki/adcs-settings/{id}/dependencies.
 */
class GetPkiAdcSettingsDependenciesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = AdcsDependency::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/adcs-settings/'.Path::segment((string) $this->id).'/dependencies';
    }
}
