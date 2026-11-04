<?php

namespace spkm\Jamf\Pro\Requests\ComputerPrestages;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\GetComputerPrestageV3;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Computer Prestage: PUT /v3/computer-prestages/{id}.
 *
 * Updates a Computer Prestage
 */
class ReplaceComputerPrestageV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = GetComputerPrestageV3::class;

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
        return '/v3/computer-prestages/'.Path::segment((string) $this->id);
    }
}
