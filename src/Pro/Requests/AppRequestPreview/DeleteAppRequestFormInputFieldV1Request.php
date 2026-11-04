<?php

namespace spkm\Jamf\Pro\Requests\AppRequestPreview;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Form Input Field record: DELETE /v1/app-request/form-input-fields/{id}.
 *
 * Removes specified form input field record
 */
class DeleteAppRequestFormInputFieldV1Request extends DeleteRequest
{
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
