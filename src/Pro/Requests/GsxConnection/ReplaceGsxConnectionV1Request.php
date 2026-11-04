<?php

namespace spkm\Jamf\Pro\Requests\GsxConnection;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\GsxConnection;
use spkm\Jamf\Requests\MergePatchRequest;

/**
 * Updates Jamf Pro GSX Connection information: PUT /v1/gsx-connection.
 */
class ReplaceGsxConnectionV1Request extends MergePatchRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = GsxConnection::class;

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
        return '/v1/gsx-connection';
    }
}
