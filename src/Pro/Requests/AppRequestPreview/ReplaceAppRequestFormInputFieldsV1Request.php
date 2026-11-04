<?php

namespace spkm\Jamf\Pro\Requests\AppRequestPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\AppRequestFormInputField;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Replace all Form Input Fields: PUT /v1/app-request/form-input-fields.
 *
 * Replace all form input fields. Will delete, update, and create all input fields accordingly.
 */
class ReplaceAppRequestFormInputFieldsV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::LIST;

    protected ?string $dto = AppRequestFormInputField::class;

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
        return '/v1/app-request/form-input-fields';
    }
}
