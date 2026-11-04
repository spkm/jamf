<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\ComputerExtensionAttributes;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update specified Computer Extension Attribute object: PUT /v1/computer-extension-attributes/{id}.
 */
class ReplaceComputerExtensionAttributeV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ComputerExtensionAttributes::class;

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
        return '/v1/computer-extension-attributes/'.Path::segment((string) $this->id);
    }
}
