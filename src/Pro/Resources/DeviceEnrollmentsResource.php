<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\DeviceEnrollmentDisownResponse;
use spkm\Jamf\Pro\Data\DeviceEnrollmentInstance;
use spkm\Jamf\Pro\Data\DeviceEnrollmentInstanceSyncStatus;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\CreateDeviceEnrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\DeleteDeviceEnrollmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\DisownDeviceEnrollmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentsPublicKeyV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentsSyncsV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentsV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentSyncsLatestV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentSyncsV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\ReplaceDeviceEnrollmentUploadTokenV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\ReplaceDeviceEnrollmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\UploadDeviceEnrollmentsTokenV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The device-enrollments endpoints of the Jamf Pro API, from Jamf::deviceEnrollments().
 *
 * @extends Builder<DeviceEnrollmentInstance>
 */
class DeviceEnrollmentsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, DeviceEnrollmentInstance::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDeviceEnrollmentsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetDeviceEnrollmentV1Request($id);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceDeviceEnrollmentV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteDeviceEnrollmentV1Request($id);
    }

    /**
     * Add Device Enrollment history object notes: POST /v1/device-enrollments/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createDeviceEnrollmentHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateDeviceEnrollmentHistoryV1Request($id, $body, $options));
    }

    /**
     * Delete a Device Enrollment Instance with the supplied id: DELETE /v1/device-enrollments/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDeviceEnrollmentV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDeviceEnrollmentV1Request($id, $options));
    }

    /**
     * Disown devices from the given Device Enrollment Instance: POST /v1/device-enrollments/{id}/disown.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function disownDeviceEnrollmentV1(int|string $id, array|JsonSerializable $body = [], array $options = []): ?DeviceEnrollmentDisownResponse
    {
        return $this->fetch(new DisownDeviceEnrollmentV1Request($id, $body, $options));
    }

    /**
     * Get sorted and paged Device Enrollment history objects: GET /v1/device-enrollments/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getDeviceEnrollmentHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetDeviceEnrollmentHistoryV1Request($id, $query));
    }

    /**
     * Get the latest sync state for a single Device Enrollment Instance: GET
     * /v1/device-enrollments/{id}/syncs/latest.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDeviceEnrollmentSyncsLatestV1(int|string $id, array $options = []): ?DeviceEnrollmentInstanceSyncStatus
    {
        return $this->fetch(new GetDeviceEnrollmentSyncsLatestV1Request($id, $options));
    }

    /**
     * Get all instance sync states for a single Device Enrollment Instance: GET /v1/device-enrollments/{id}/syncs.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, DeviceEnrollmentInstanceSyncStatus>
     */
    public function getDeviceEnrollmentSyncsV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetDeviceEnrollmentSyncsV1Request($id, $options));
    }

    /**
     * Retrieve a Device Enrollment Instance with the supplied id: GET /v1/device-enrollments/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDeviceEnrollmentV1(int|string $id, array $options = []): ?DeviceEnrollmentInstance
    {
        return $this->fetch(new GetDeviceEnrollmentV1Request($id, $options));
    }

    /**
     * Retrieve the Jamf Pro Device Enrollment public key: GET /v1/device-enrollments/public-key.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDeviceEnrollmentsPublicKeyV1(array $options = []): ?string
    {
        return $this->fetch(new GetDeviceEnrollmentsPublicKeyV1Request($options));
    }

    /**
     * Get all instance sync states for all Device Enrollment Instances: GET /v1/device-enrollments/syncs.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, DeviceEnrollmentInstanceSyncStatus>
     */
    public function getDeviceEnrollmentsSyncsV1(array $options = []): Collection
    {
        return $this->fetch(new GetDeviceEnrollmentsSyncsV1Request($options));
    }

    /**
     * Read all sorted and paged Device Enrollment instances: GET /v1/device-enrollments.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<DeviceEnrollmentInstance>
     */
    public function getDeviceEnrollmentsV1(): PagedResource
    {
        return new PagedResource($this->pro(), DeviceEnrollmentInstance::class, fn (Query $query) => new GetDeviceEnrollmentsV1Request($query));
    }

    /**
     * Update a Device Enrollment Instance with the supplied Token: PUT /v1/device-enrollments/{id}/upload-token.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceDeviceEnrollmentUploadTokenV1(int|string $id, array|JsonSerializable $body, array $options = []): ?DeviceEnrollmentInstance
    {
        return $this->fetch(new ReplaceDeviceEnrollmentUploadTokenV1Request($id, $body, $options));
    }

    /**
     * Update a Device Enrollment Instance with the supplied id: PUT /v1/device-enrollments/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceDeviceEnrollmentV1(int|string $id, array|JsonSerializable $body, array $options = []): ?DeviceEnrollmentInstance
    {
        return $this->fetch(new ReplaceDeviceEnrollmentV1Request($id, $body, $options));
    }

    /**
     * Create a Device Enrollment Instance with the supplied Token: POST /v1/device-enrollments/upload-token.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function uploadDeviceEnrollmentsTokenV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new UploadDeviceEnrollmentsTokenV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
