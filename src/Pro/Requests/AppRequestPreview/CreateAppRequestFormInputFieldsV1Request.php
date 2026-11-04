<?php

namespace spkm\Jamf\Pro\Requests\AppRequestPreview;

use JsonSerializable;
use spkm\Jamf\Pro\Data\AppRequestFormInputField;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create Form Input Field record: POST /v1/app-request/form-input-fields.
 *
 * Create form input field record
 */
class CreateAppRequestFormInputFieldsV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

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
