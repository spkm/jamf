<?php

namespace spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\MacOsBrandingConfiguration;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Self Service macOS branding configuration with the supplied details: PUT /v1/self-service/branding/macos/{id}.
 */
class ReplaceSelfServiceBrandingMacosV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = MacOsBrandingConfiguration::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/self-service/branding/macos/'.Path::segment((string) $this->id);
    }
}
