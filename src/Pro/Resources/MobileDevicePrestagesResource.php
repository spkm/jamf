<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\FileAttachmentV2;
use spkm\Jamf\Pro\Data\FileAttachmentV3;
use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV2;
use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV3;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\PrestageFileAttachmentV2;
use spkm\Jamf\Pro\Data\PrestageFileAttachmentV3;
use spkm\Jamf\Pro\Data\PrestageScopeResponseV2;
use spkm\Jamf\Pro\Data\PrestageScopeV2;
use spkm\Jamf\Pro\Data\PrestageSyncStatusV2;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageAttachmentsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageAttachmentsV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageHistoryV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageHistoryV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestagesV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestagesV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMobileDevicePrestageV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMobileDevicePrestageV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMultipleMobileDevicePrestageAttachmentsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMultipleMobileDevicePrestageAttachmentsV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMultipleMobileDevicePrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageAttachmentsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageAttachmentsV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageHistoryV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageHistoryV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestagesScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestagesSyncsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestagesV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestagesV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageSyncsLatestV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageSyncsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\ReplaceMobileDevicePrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\ReplaceMobileDevicePrestageV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\ReplaceMobileDevicePrestageV3Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;
use SplFileInfo;

/**
 * The mobile-device-prestages endpoints of the Jamf Pro API, from Jamf::mobileDevicePrestages().
 *
 * @extends Builder<GetMobileDevicePrestageV3>
 */
class MobileDevicePrestagesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, GetMobileDevicePrestageV3::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMobileDevicePrestagesV3Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetMobileDevicePrestageV3Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateMobileDevicePrestagesV3Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceMobileDevicePrestageV3Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteMobileDevicePrestageV3Request($id);
    }

    /**
     * Add an attachment to a Mobile Device Prestage: POST /v2/mobile-device-prestages/{id}/attachments.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDevicePrestageAttachmentsV2(int|string $id, mixed $file, ?string $filename = null, array $options = []): ?PrestageFileAttachmentV2
    {
        return $this->fetch(new CreateMobileDevicePrestageAttachmentsV2Request($id, $file, $filename, $options));
    }

    /**
     * Add an attachment to a Mobile Device Prestage: POST /v3/mobile-device-prestages/{id}/attachments.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDevicePrestageAttachmentsV3(int|string $id, mixed $file, ?string $filename = null, array $options = []): ?PrestageFileAttachmentV3
    {
        return $this->fetch(new CreateMobileDevicePrestageAttachmentsV3Request($id, $file, $filename, $options));
    }

    /**
     * Add Mobile Device Prestage history object notes: POST /v2/mobile-device-prestages/{id}/history.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDevicePrestageHistoryV2(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDevicePrestageHistoryV2Request($id, $body, $options));
    }

    /**
     * Add Mobile Device Prestage history object notes: POST /v3/mobile-device-prestages/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDevicePrestageHistoryV3(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDevicePrestageHistoryV3Request($id, $body, $options));
    }

    /**
     * Add Device Scope for a specific Mobile Device Prestage: POST /v2/mobile-device-prestages/{id}/scope.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDevicePrestageScopeV2(int|string $id, array|JsonSerializable $body, array $options = []): ?PrestageScopeResponseV2
    {
        return $this->fetch(new CreateMobileDevicePrestageScopeV2Request($id, $body, $options));
    }

    /**
     * Create a Mobile Device Prestage: POST /v2/mobile-device-prestages.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDevicePrestagesV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDevicePrestagesV2Request($body, $options));
    }

    /**
     * Create a Mobile Device Prestage: POST /v3/mobile-device-prestages.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMobileDevicePrestagesV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDevicePrestagesV3Request($body, $options));
    }

    /**
     * Delete a Mobile Device Prestage with the supplied id: DELETE /v2/mobile-device-prestages/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDevicePrestageV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDevicePrestageV2Request($id, $options));
    }

    /**
     * Delete a Mobile Device Prestage with the supplied id: DELETE /v3/mobile-device-prestages/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDevicePrestageV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDevicePrestageV3Request($id, $options));
    }

    /**
     * Remove an attachment for a Mobile Device Prestage: POST
     * /v2/mobile-device-prestages/{id}/attachments/delete-multiple.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleMobileDevicePrestageAttachmentsV2(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleMobileDevicePrestageAttachmentsV2Request($id, $body, $options));
    }

    /**
     * Remove an attachment for a Mobile Device Prestage: POST
     * /v3/mobile-device-prestages/{id}/attachments/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleMobileDevicePrestageAttachmentsV3(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleMobileDevicePrestageAttachmentsV3Request($id, $body, $options));
    }

    /**
     * Remove Device Scope for a specific Mobile Device Prestage: POST
     * /v2/mobile-device-prestages/{id}/scope/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleMobileDevicePrestageScopeV2(int|string $id, array|JsonSerializable $body, array $options = []): ?PrestageScopeResponseV2
    {
        return $this->fetch(new DeleteMultipleMobileDevicePrestageScopeV2Request($id, $body, $options));
    }

    /**
     * Get attachments for a Mobile Device Prestage: GET /v2/mobile-device-prestages/{id}/attachments.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, FileAttachmentV2>
     */
    public function getMobileDevicePrestageAttachmentsV2(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetMobileDevicePrestageAttachmentsV2Request($id, $options));
    }

    /**
     * Get attachments for a Mobile Device Prestage: GET /v3/mobile-device-prestages/{id}/attachments.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, FileAttachmentV3>
     */
    public function getMobileDevicePrestageAttachmentsV3(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetMobileDevicePrestageAttachmentsV3Request($id, $options));
    }

    /**
     * Get sorted and paged Mobile Device Prestage history objects: GET /v2/mobile-device-prestages/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getMobileDevicePrestageHistoryV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetMobileDevicePrestageHistoryV2Request($id, $query));
    }

    /**
     * Get sorted and paged Mobile Device Prestage history objects: GET /v3/mobile-device-prestages/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getMobileDevicePrestageHistoryV3(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetMobileDevicePrestageHistoryV3Request($id, $query));
    }

    /**
     * Get Device Scope for a specific Mobile Device Prestage: GET /v2/mobile-device-prestages/{id}/scope.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDevicePrestageScopeV2(int|string $id, array $options = []): ?PrestageScopeResponseV2
    {
        return $this->fetch(new GetMobileDevicePrestageScopeV2Request($id, $options));
    }

    /**
     * Get the latest Sync State for a single Prestage: GET /v2/mobile-device-prestages/{id}/syncs/latest.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDevicePrestageSyncsLatestV2(int|string $id, array $options = []): ?PrestageSyncStatusV2
    {
        return $this->fetch(new GetMobileDevicePrestageSyncsLatestV2Request($id, $options));
    }

    /**
     * Get all prestage sync states for a single prestage: GET /v2/mobile-device-prestages/{id}/syncs.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PrestageSyncStatusV2>
     */
    public function getMobileDevicePrestageSyncsV2(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetMobileDevicePrestageSyncsV2Request($id, $options));
    }

    /**
     * Retrieve a Mobile Device Prestage with the supplied id: GET /v2/mobile-device-prestages/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDevicePrestageV2(int|string $id, array $options = []): ?GetMobileDevicePrestageV2
    {
        return $this->fetch(new GetMobileDevicePrestageV2Request($id, $options));
    }

    /**
     * Retrieve a Mobile Device Prestage with the supplied id: GET /v3/mobile-device-prestages/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDevicePrestageV3(int|string $id, array $options = []): ?GetMobileDevicePrestageV3
    {
        return $this->fetch(new GetMobileDevicePrestageV3Request($id, $options));
    }

    /**
     * Get all Device Scope for all Mobile Device Prestages: GET /v2/mobile-device-prestages/scope.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDevicePrestagesScopeV2(array $options = []): ?PrestageScopeV2
    {
        return $this->fetch(new GetMobileDevicePrestagesScopeV2Request($options));
    }

    /**
     * Get all Prestage sync States for all prestages: GET /v2/mobile-device-prestages/syncs.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, PrestageSyncStatusV2>
     */
    public function getMobileDevicePrestagesSyncsV2(array $options = []): Collection
    {
        return $this->fetch(new GetMobileDevicePrestagesSyncsV2Request($options));
    }

    /**
     * Get sorted and paged Mobile Device Prestages: GET /v2/mobile-device-prestages.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @return PagedResource<GetMobileDevicePrestageV2>
     */
    public function getMobileDevicePrestagesV2(): PagedResource
    {
        return new PagedResource($this->pro(), GetMobileDevicePrestageV2::class, fn (Query $query) => new GetMobileDevicePrestagesV2Request($query));
    }

    /**
     * Get sorted and paged Mobile Device Prestages: GET /v3/mobile-device-prestages.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<GetMobileDevicePrestageV3>
     */
    public function getMobileDevicePrestagesV3(): PagedResource
    {
        return new PagedResource($this->pro(), GetMobileDevicePrestageV3::class, fn (Query $query) => new GetMobileDevicePrestagesV3Request($query));
    }

    /**
     * Replace Device Scope for a specific Mobile Device Prestage: PUT /v2/mobile-device-prestages/{id}/scope.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceMobileDevicePrestageScopeV2(int|string $id, array|JsonSerializable $body, array $options = []): ?PrestageScopeResponseV2
    {
        return $this->fetch(new ReplaceMobileDevicePrestageScopeV2Request($id, $body, $options));
    }

    /**
     * Update a Mobile Device Prestage: PUT /v2/mobile-device-prestages/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceMobileDevicePrestageV2(int|string $id, array|JsonSerializable $body, array $options = []): ?GetMobileDevicePrestageV2
    {
        return $this->fetch(new ReplaceMobileDevicePrestageV2Request($id, $body, $options));
    }

    /**
     * Update a Mobile Device Prestage: PUT /v3/mobile-device-prestages/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceMobileDevicePrestageV3(int|string $id, array|JsonSerializable $body, array $options = []): ?GetMobileDevicePrestageV3
    {
        return $this->fetch(new ReplaceMobileDevicePrestageV3Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
