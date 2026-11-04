<?php

namespace spkm\Jamf\Pro\Requests\ApiIntegrations;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ApiIntegrationResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create API integration object: POST /v1/api-integrations.
 */
class CreateApiIntegrationsV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = ApiIntegrationResponse::class;

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
        return '/v1/api-integrations';
    }
}
