<?php

namespace spkm\Jamf\Pro\Requests\JamfProServerUrlPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\JamfProServerUrl;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Jamf Pro Server URL settings: PUT /v1/jamf-pro-server-url.
 */
class ReplaceJamfProServerUrlV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = JamfProServerUrl::class;

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
        return '/v1/jamf-pro-server-url';
    }
}
