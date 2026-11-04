<?php

namespace spkm\Jamf\Pro\Requests\AdcsSettings;

use JsonSerializable;
use spkm\Jamf\Requests\MergePatchRequest;
use spkm\Jamf\Support\Path;

/**
 * Update AD CS Settings configuration: PATCH /v1/pki/adcs-settings/{id}.
 */
class UpdatePkiAdcSettingsV1Request extends MergePatchRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/adcs-settings/'.Path::segment((string) $this->id);
    }
}
