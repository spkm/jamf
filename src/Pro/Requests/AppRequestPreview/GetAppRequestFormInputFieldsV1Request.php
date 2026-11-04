<?php

namespace spkm\Jamf\Pro\Requests\AppRequestPreview;

use spkm\Jamf\Pro\Data\AppRequestFormInputField;
use spkm\Jamf\Requests\GetRequest;

/**
 * Search for Form Input Fields: GET /v1/app-request/form-input-fields.
 *
 * Search for form input fields
 */
class GetAppRequestFormInputFieldsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = AppRequestFormInputField::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/app-request/form-input-fields';
    }
}
