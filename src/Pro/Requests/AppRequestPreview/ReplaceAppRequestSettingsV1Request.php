<?php

namespace spkm\Jamf\Pro\Requests\AppRequestPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\AppRequestSettings;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Application Request Settings: PUT /v1/app-request/settings.
 *
 * Update app request settings
 */
class ReplaceAppRequestSettingsV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = AppRequestSettings::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/app-request/settings';
    }
}
