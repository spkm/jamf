<?php

namespace spkm\Jamf\Pro\Requests\AppRequestPreview;

use spkm\Jamf\Pro\Data\AppRequestFormInputField;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Form Input Field object: GET /v1/app-request/form-input-fields/{id}.
 *
 * Gets specified form input field object
 */
class GetAppRequestFormInputFieldV1Request extends GetRequest
{
    protected ?string $dto = AppRequestFormInputField::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/app-request/form-input-fields/'.Path::segment((string) $this->id);
    }
}
