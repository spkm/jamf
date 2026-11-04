<?php

namespace spkm\Jamf\Pro\Requests\SelfService;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\SelfServiceSettings;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Put an object representation of Self Service settings: PUT /v1/self-service/settings.
 *
 * puts an object representation of Self Service settings
 */
class ReplaceSelfServiceSettingsV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = SelfServiceSettings::class;

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
        return '/v1/self-service/settings';
    }
}
