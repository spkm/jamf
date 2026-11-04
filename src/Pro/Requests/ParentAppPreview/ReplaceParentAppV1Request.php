<?php

namespace spkm\Jamf\Pro\Requests\ParentAppPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\ParentApp;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Jamf Parent app settings: PUT /v1/parent-app.
 */
class ReplaceParentAppV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ParentApp::class;

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
        return '/v1/parent-app';
    }
}
