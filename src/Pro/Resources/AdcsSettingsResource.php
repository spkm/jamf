<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\AdcsDependency;
use spkm\Jamf\Pro\Data\AdcsSettingsResponse;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\AdcsSettings\CreatePkiAdcSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\CreatePkiAdcsSettingsV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\DeletePkiAdcSettingsV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\GetPkiAdcSettingsDependenciesV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\GetPkiAdcSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\GetPkiAdcSettingsV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\UpdatePkiAdcSettingsV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\ValidatePkiAdcsSettingsCertificateV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\ValidatePkiAdcsSettingsClientCertificateV1Request;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Resources\PagedResource;

/**
 * The adcs-settings endpoints of the Jamf Pro API, from Jamf::adcsSettings().
 *
 * @extends BaseResource<Data>
 */
class AdcsSettingsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Add specified AD CS Settings object note: POST /v1/pki/adcs-settings/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPkiAdcSettingsHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreatePkiAdcSettingsHistoryV1Request($id, $body, $options));
    }

    /**
     * Create AD CS Settings configuration for either inbound or outbound mode: POST /v1/pki/adcs-settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPkiAdcsSettingsV1(array|JsonSerializable $body, array $options = []): ?string
    {
        return $this->fetch(new CreatePkiAdcsSettingsV1Request($body, $options));
    }

    /**
     * Delete AD CS Settings configuration by ID: DELETE /v1/pki/adcs-settings/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePkiAdcSettingsV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePkiAdcSettingsV1Request($id, $options));
    }

    /**
     * Retrieve list of AD CS Settings dependencies: GET /v1/pki/adcs-settings/{id}/dependencies.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, AdcsDependency>
     */
    public function getPkiAdcSettingsDependenciesV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPkiAdcSettingsDependenciesV1Request($id, $options));
    }

    /**
     * Get specified AD CS Settings history object: GET /v1/pki/adcs-settings/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getPkiAdcSettingsHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetPkiAdcSettingsHistoryV1Request($id, $query));
    }

    /**
     * Get AD CS Settings configuration for the ID value: GET /v1/pki/adcs-settings/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiAdcSettingsV1(int|string $id, array $options = []): ?AdcsSettingsResponse
    {
        return $this->fetch(new GetPkiAdcSettingsV1Request($id, $options));
    }

    /**
     * Update AD CS Settings configuration: PATCH /v1/pki/adcs-settings/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updatePkiAdcSettingsV1(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdatePkiAdcSettingsV1Request($id, $body, $options));
    }

    /**
     * Validate AD CS Settings server certificate: POST /v1/pki/adcs-settings/validate-certificate.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function validatePkiAdcsSettingsCertificateV1(array|JsonSerializable $body = [], array $options = []): bool
    {
        return $this->perform(new ValidatePkiAdcsSettingsCertificateV1Request($body, $options));
    }

    /**
     * Validate AD CS Settings client certificate: POST /v1/pki/adcs-settings/validate-client-certificate.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function validatePkiAdcsSettingsClientCertificateV1(array|JsonSerializable $body = [], array $options = []): bool
    {
        return $this->perform(new ValidatePkiAdcsSettingsClientCertificateV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
