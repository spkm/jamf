<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\AppRequestFormInputField;
use spkm\Jamf\Pro\Data\AppRequestSettings;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\AppRequestPreview\CreateAppRequestFormInputFieldsV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\DeleteAppRequestFormInputFieldV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\GetAppRequestFormInputFieldsV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\GetAppRequestFormInputFieldV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\GetAppRequestSettingsV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\ReplaceAppRequestFormInputFieldsV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\ReplaceAppRequestFormInputFieldV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\ReplaceAppRequestSettingsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The app-request-preview endpoints of the Jamf Pro API, from Jamf::appRequestPreview().
 *
 * @extends BaseResource<Data>
 */
class AppRequestPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create Form Input Field record: POST /v1/app-request/form-input-fields.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createAppRequestFormInputFieldsV1(array|JsonSerializable $body, array $options = []): ?AppRequestFormInputField
    {
        return $this->fetch(new CreateAppRequestFormInputFieldsV1Request($body, $options));
    }

    /**
     * Remove specified Form Input Field record: DELETE /v1/app-request/form-input-fields/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAppRequestFormInputFieldV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAppRequestFormInputFieldV1Request($id, $options));
    }

    /**
     * Get specified Form Input Field object: GET /v1/app-request/form-input-fields/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAppRequestFormInputFieldV1(int|string $id, array $options = []): ?AppRequestFormInputField
    {
        return $this->fetch(new GetAppRequestFormInputFieldV1Request($id, $options));
    }

    /**
     * Search for Form Input Fields: GET /v1/app-request/form-input-fields.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, AppRequestFormInputField>
     */
    public function getAppRequestFormInputFieldsV1(array $options = []): Collection
    {
        return $this->fetch(new GetAppRequestFormInputFieldsV1Request($options));
    }

    /**
     * Get Applicastion Request Settings: GET /v1/app-request/settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAppRequestSettingsV1(array $options = []): ?AppRequestSettings
    {
        return $this->fetch(new GetAppRequestSettingsV1Request($options));
    }

    /**
     * Update specified Form Input Field object: PUT /v1/app-request/form-input-fields/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceAppRequestFormInputFieldV1(int|string $id, array|JsonSerializable $body, array $options = []): ?AppRequestFormInputField
    {
        return $this->fetch(new ReplaceAppRequestFormInputFieldV1Request($id, $body, $options));
    }

    /**
     * Replace all Form Input Fields: PUT /v1/app-request/form-input-fields.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, AppRequestFormInputField>
     */
    public function replaceAppRequestFormInputFieldsV1(array|JsonSerializable $body, array $options = []): Collection
    {
        return $this->fetch(new ReplaceAppRequestFormInputFieldsV1Request($body, $options));
    }

    /**
     * Update Application Request Settings: PUT /v1/app-request/settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceAppRequestSettingsV1(array|JsonSerializable $body, array $options = []): ?AppRequestSettings
    {
        return $this->fetch(new ReplaceAppRequestSettingsV1Request($body, $options));
    }
}
