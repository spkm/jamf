<?php

namespace spkm\Jamf\Pro\Requests\AppRequestPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\AppRequestFormInputField;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update specified Form Input Field object: PUT /v1/app-request/form-input-fields/{id}.
 *
 * Update specified form input field object
 */
class ReplaceAppRequestFormInputFieldV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = AppRequestFormInputField::class;

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
        return '/v1/app-request/form-input-fields/'.Path::segment((string) $this->id);
    }
}
