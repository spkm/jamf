<?php

namespace spkm\Jamf\Pro\Requests\ReturnToService;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\ReturnToServiceConfiguration;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Return to Service Configuration: PUT /v1/return-to-service/{id}.
 *
 * Updates a Return to Service Configuration
 */
class ReplaceReturnToServiceV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ReturnToServiceConfiguration::class;

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
        return '/v1/return-to-service/'.Path::segment((string) $this->id);
    }
}
