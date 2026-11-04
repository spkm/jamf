<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ComputerInventory;
use spkm\Jamf\Pro\Data\ComputerInventoryDeviceLockPinResponse;
use spkm\Jamf\Pro\Data\ComputerInventoryFileVault;
use spkm\Jamf\Pro\Data\ComputerInventoryRecoveryLockPasswordResponse;
use spkm\Jamf\Pro\Data\ComputerInventoryV2;
use spkm\Jamf\Pro\Data\ComputerInventoryV3;
use spkm\Jamf\Pro\Data\ComputerInventoryV4;
use spkm\Jamf\Pro\Data\EraseDeviceComputerResponse;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\RemoveComputerMdmProfileResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputerInventoryAttachmentsV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputerInventoryAttachmentsV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputerInventoryAttachmentsV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputerInventoryAttachmentsV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputersInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputersInventoryV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputersInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputersInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryAttachmentV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryAttachmentV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryAttachmentV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryAttachmentV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\EraseComputerInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\EraseComputerInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryAttachmentV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryAttachmentV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryAttachmentV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryAttachmentV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryDetailV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryDetailV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryDetailV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryDetailV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryFilevaultV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryFilevaultV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryFilevaultV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryFilevaultV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewDeviceLockPinV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewDeviceLockPinV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewDeviceLockPinV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewDeviceLockPinV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryFilevaultV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryFilevaultV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryFilevaultV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryFilevaultV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\RemoveComputerInventoryMdmProfileV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\RemoveComputerInventoryMdmProfileV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\UpdateComputerInventoryDetailV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\UpdateComputerInventoryDetailV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\UpdateComputerInventoryDetailV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\UpdateComputerInventoryDetailV4Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;
use SplFileInfo;

/**
 * The computer-inventory endpoints of the Jamf Pro API, from Jamf::computerInventory().
 *
 * @extends Builder<ComputerInventoryV4>
 */
class ComputerInventoryResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ComputerInventoryV4::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetComputersInventoryV4Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetComputerInventoryV4Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateComputersInventoryV4Request($body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteComputerInventoryV4Request($id);
    }

    /**
     * Upload attachment and assign to computer: POST /v1/computers-inventory/{id}/attachments.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerInventoryAttachmentsV1(int|string $id, mixed $file, ?string $filename = null, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerInventoryAttachmentsV1Request($id, $file, $filename, $options));
    }

    /**
     * Upload attachment and assign to computer: POST /v2/computers-inventory/{id}/attachments.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerInventoryAttachmentsV2(int|string $id, mixed $file, ?string $filename = null, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerInventoryAttachmentsV2Request($id, $file, $filename, $options));
    }

    /**
     * Upload attachment and assign to computer: POST /v3/computers-inventory/{id}/attachments.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerInventoryAttachmentsV3(int|string $id, mixed $file, ?string $filename = null, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerInventoryAttachmentsV3Request($id, $file, $filename, $options));
    }

    /**
     * Upload attachment and assign to computer: POST /v4/computers-inventory/{id}/attachments.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerInventoryAttachmentsV4(int|string $id, mixed $file, ?string $filename = null, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerInventoryAttachmentsV4Request($id, $file, $filename, $options));
    }

    /**
     * Create Computer Inventory record: POST /v1/computers-inventory.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputersInventoryV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputersInventoryV1Request($body, $options));
    }

    /**
     * Create Computer Inventory record: POST /v2/computers-inventory.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputersInventoryV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputersInventoryV2Request($body, $options));
    }

    /**
     * Create Computer Inventory record: POST /v3/computers-inventory.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputersInventoryV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputersInventoryV3Request($body, $options));
    }

    /**
     * Create Computer Inventory record: POST /v4/computers-inventory.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputersInventoryV4(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputersInventoryV4Request($body, $options));
    }

    /**
     * Remove attachment: DELETE /v1/computers-inventory/{id}/attachments/{attachmentId}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryAttachmentV1(int|string $id, int|string $attachmentId, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryAttachmentV1Request($id, $attachmentId, $options));
    }

    /**
     * Remove attachment: DELETE /v2/computers-inventory/{id}/attachments/{attachmentId}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryAttachmentV2(int|string $id, int|string $attachmentId, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryAttachmentV2Request($id, $attachmentId, $options));
    }

    /**
     * Remove attachment: DELETE /v3/computers-inventory/{id}/attachments/{attachmentId}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryAttachmentV3(int|string $id, int|string $attachmentId, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryAttachmentV3Request($id, $attachmentId, $options));
    }

    /**
     * Remove attachment: DELETE /v4/computers-inventory/{id}/attachments/{attachmentId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryAttachmentV4(int|string $id, int|string $attachmentId, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryAttachmentV4Request($id, $attachmentId, $options));
    }

    /**
     * Remove specified Computer record: DELETE /v1/computers-inventory/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryV1Request($id, $options));
    }

    /**
     * Remove specified Computer record: DELETE /v2/computers-inventory/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryV2Request($id, $options));
    }

    /**
     * Remove specified Computer record: DELETE /v3/computers-inventory/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryV3Request($id, $options));
    }

    /**
     * Remove specified Computer record: DELETE /v4/computers-inventory/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInventoryV4(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInventoryV4Request($id, $options));
    }

    /**
     * Erase a computer: POST /v1/computer-inventory/{id}/erase.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function eraseComputerInventoryV1(int|string $id, array|JsonSerializable $body = [], array $options = []): ?EraseDeviceComputerResponse
    {
        return $this->fetch(new EraseComputerInventoryV1Request($id, $body, $options));
    }

    /**
     * Erase a computer: POST /v4/computers-inventory/{id}/erase.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function eraseComputerInventoryV4(int|string $id, array|JsonSerializable $body = [], array $options = []): ?EraseDeviceComputerResponse
    {
        return $this->fetch(new EraseComputerInventoryV4Request($id, $body, $options));
    }

    /**
     * Download attachment file: GET /v1/computers-inventory/{id}/attachments/{attachmentId}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryAttachmentV1(int|string $id, int|string $attachmentId, array $options = []): ?string
    {
        return $this->fetch(new GetComputerInventoryAttachmentV1Request($id, $attachmentId, $options));
    }

    /**
     * Download attachment file: GET /v2/computers-inventory/{id}/attachments/{attachmentId}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryAttachmentV2(int|string $id, int|string $attachmentId, array $options = []): ?string
    {
        return $this->fetch(new GetComputerInventoryAttachmentV2Request($id, $attachmentId, $options));
    }

    /**
     * Download attachment file: GET /v3/computers-inventory/{id}/attachments/{attachmentId}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryAttachmentV3(int|string $id, int|string $attachmentId, array $options = []): ?string
    {
        return $this->fetch(new GetComputerInventoryAttachmentV3Request($id, $attachmentId, $options));
    }

    /**
     * Download attachment file: GET /v4/computers-inventory/{id}/attachments/{attachmentId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryAttachmentV4(int|string $id, int|string $attachmentId, array $options = []): ?string
    {
        return $this->fetch(new GetComputerInventoryAttachmentV4Request($id, $attachmentId, $options));
    }

    /**
     * Return all sections of a computer: GET /v1/computers-inventory-detail/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryDetailV1(int|string $id, array $options = []): ?ComputerInventory
    {
        return $this->fetch(new GetComputerInventoryDetailV1Request($id, $options));
    }

    /**
     * Return all sections of a computer: GET /v2/computers-inventory-detail/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryDetailV2(int|string $id, array $options = []): ?ComputerInventoryV2
    {
        return $this->fetch(new GetComputerInventoryDetailV2Request($id, $options));
    }

    /**
     * Return all sections of a computer: GET /v3/computers-inventory-detail/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryDetailV3(int|string $id, array $options = []): ?ComputerInventoryV3
    {
        return $this->fetch(new GetComputerInventoryDetailV3Request($id, $options));
    }

    /**
     * Return all sections of a computer: GET /v4/computers-inventory-detail/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryDetailV4(int|string $id, array $options = []): ?ComputerInventoryV4
    {
        return $this->fetch(new GetComputerInventoryDetailV4Request($id, $options));
    }

    /**
     * Return FileVault information for a specific computer: GET /v1/computers-inventory/{id}/filevault.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryFilevaultV1(int|string $id, array $options = []): ?ComputerInventoryFileVault
    {
        return $this->fetch(new GetComputerInventoryFilevaultV1Request($id, $options));
    }

    /**
     * Return FileVault information for a specific computer: GET /v2/computers-inventory/{id}/filevault.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryFilevaultV2(int|string $id, array $options = []): ?ComputerInventoryFileVault
    {
        return $this->fetch(new GetComputerInventoryFilevaultV2Request($id, $options));
    }

    /**
     * Return FileVault information for a specific computer: GET /v3/computers-inventory/{id}/filevault.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryFilevaultV3(int|string $id, array $options = []): ?ComputerInventoryFileVault
    {
        return $this->fetch(new GetComputerInventoryFilevaultV3Request($id, $options));
    }

    /**
     * Return FileVault information for a specific computer: GET /v4/computers-inventory/{id}/filevault.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryFilevaultV4(int|string $id, array $options = []): ?ComputerInventoryFileVault
    {
        return $this->fetch(new GetComputerInventoryFilevaultV4Request($id, $options));
    }

    /**
     * Return General section of a Computer: GET /v1/computers-inventory/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: section.
     */
    public function getComputerInventoryV1(int|string $id, array $options = []): ?ComputerInventory
    {
        return $this->fetch(new GetComputerInventoryV1Request($id, $options));
    }

    /**
     * Return General section of a Computer: GET /v2/computers-inventory/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: section.
     */
    public function getComputerInventoryV2(int|string $id, array $options = []): ?ComputerInventoryV2
    {
        return $this->fetch(new GetComputerInventoryV2Request($id, $options));
    }

    /**
     * Return General section of a Computer: GET /v3/computers-inventory/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: section.
     */
    public function getComputerInventoryV3(int|string $id, array $options = []): ?ComputerInventoryV3
    {
        return $this->fetch(new GetComputerInventoryV3Request($id, $options));
    }

    /**
     * Return General section of a Computer: GET /v4/computers-inventory/{id}.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: section.
     */
    public function getComputerInventoryV4(int|string $id, array $options = []): ?ComputerInventoryV4
    {
        return $this->fetch(new GetComputerInventoryV4Request($id, $options));
    }

    /**
     * Return a computer's Device Lock PIN: GET /v1/computers-inventory/{id}/view-device-lock-pin.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryViewDeviceLockPinV1(int|string $id, array $options = []): ?ComputerInventoryDeviceLockPinResponse
    {
        return $this->fetch(new GetComputerInventoryViewDeviceLockPinV1Request($id, $options));
    }

    /**
     * Return a computer's Device Lock PIN: GET /v2/computers-inventory/{id}/view-device-lock-pin.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryViewDeviceLockPinV2(int|string $id, array $options = []): ?ComputerInventoryDeviceLockPinResponse
    {
        return $this->fetch(new GetComputerInventoryViewDeviceLockPinV2Request($id, $options));
    }

    /**
     * Return a computer's Device Lock PIN: GET /v3/computers-inventory/{id}/view-device-lock-pin.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryViewDeviceLockPinV3(int|string $id, array $options = []): ?ComputerInventoryDeviceLockPinResponse
    {
        return $this->fetch(new GetComputerInventoryViewDeviceLockPinV3Request($id, $options));
    }

    /**
     * Return a computer's Device Lock PIN: GET /v4/computers-inventory/{id}/view-device-lock-pin.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryViewDeviceLockPinV4(int|string $id, array $options = []): ?ComputerInventoryDeviceLockPinResponse
    {
        return $this->fetch(new GetComputerInventoryViewDeviceLockPinV4Request($id, $options));
    }

    /**
     * Return a Computers Recovery Lock Password: GET /v1/computers-inventory/{id}/view-recovery-lock-password.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryViewRecoveryLockPasswordV1(int|string $id, array $options = []): ?ComputerInventoryRecoveryLockPasswordResponse
    {
        return $this->fetch(new GetComputerInventoryViewRecoveryLockPasswordV1Request($id, $options));
    }

    /**
     * Return a Computers Recovery Lock Password: GET /v2/computers-inventory/{id}/view-recovery-lock-password.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryViewRecoveryLockPasswordV2(int|string $id, array $options = []): ?ComputerInventoryRecoveryLockPasswordResponse
    {
        return $this->fetch(new GetComputerInventoryViewRecoveryLockPasswordV2Request($id, $options));
    }

    /**
     * Return a Computers Recovery Lock Password: GET /v3/computers-inventory/{id}/view-recovery-lock-password.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryViewRecoveryLockPasswordV3(int|string $id, array $options = []): ?ComputerInventoryRecoveryLockPasswordResponse
    {
        return $this->fetch(new GetComputerInventoryViewRecoveryLockPasswordV3Request($id, $options));
    }

    /**
     * Return a Computers Recovery Lock Password: GET /v4/computers-inventory/{id}/view-recovery-lock-password.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerInventoryViewRecoveryLockPasswordV4(int|string $id, array $options = []): ?ComputerInventoryRecoveryLockPasswordResponse
    {
        return $this->fetch(new GetComputerInventoryViewRecoveryLockPasswordV4Request($id, $options));
    }

    /**
     * Return paginated FileVault information for all computers: GET /v1/computers-inventory/filevault.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @return PagedResource<ComputerInventoryFileVault>
     */
    public function getComputersInventoryFilevaultV1(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerInventoryFileVault::class, fn (Query $query) => new GetComputersInventoryFilevaultV1Request($query));
    }

    /**
     * Return paginated FileVault information for all computers: GET /v2/computers-inventory/filevault.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @return PagedResource<ComputerInventoryFileVault>
     */
    public function getComputersInventoryFilevaultV2(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerInventoryFileVault::class, fn (Query $query) => new GetComputersInventoryFilevaultV2Request($query));
    }

    /**
     * Return paginated FileVault information for all computers: GET /v3/computers-inventory/filevault.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @return PagedResource<ComputerInventoryFileVault>
     */
    public function getComputersInventoryFilevaultV3(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerInventoryFileVault::class, fn (Query $query) => new GetComputersInventoryFilevaultV3Request($query));
    }

    /**
     * Return paginated FileVault information for all computers: GET /v4/computers-inventory/filevault.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ComputerInventoryFileVault>
     */
    public function getComputersInventoryFilevaultV4(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerInventoryFileVault::class, fn (Query $query) => new GetComputersInventoryFilevaultV4Request($query));
    }

    /**
     * Return paginated Computer Inventory records: GET /v1/computers-inventory.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @return PagedResource<ComputerInventory>
     */
    public function getComputersInventoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerInventory::class, fn (Query $query) => new GetComputersInventoryV1Request($query));
    }

    /**
     * Return paginated Computer Inventory records: GET /v2/computers-inventory.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @return PagedResource<ComputerInventoryV2>
     */
    public function getComputersInventoryV2(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerInventoryV2::class, fn (Query $query) => new GetComputersInventoryV2Request($query));
    }

    /**
     * Return paginated Computer Inventory records: GET /v3/computers-inventory.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @return PagedResource<ComputerInventoryV3>
     */
    public function getComputersInventoryV3(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerInventoryV3::class, fn (Query $query) => new GetComputersInventoryV3Request($query));
    }

    /**
     * Return paginated Computer Inventory records: GET /v4/computers-inventory.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ComputerInventoryV4>
     */
    public function getComputersInventoryV4(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerInventoryV4::class, fn (Query $query) => new GetComputersInventoryV4Request($query));
    }

    /**
     * Remove a computer's MDM profile: POST /v1/computer-inventory/{id}/remove-mdm-profile.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function removeComputerInventoryMdmProfileV1(int|string $id, array $options = []): ?RemoveComputerMdmProfileResponse
    {
        return $this->fetch(new RemoveComputerInventoryMdmProfileV1Request($id, $options));
    }

    /**
     * Remove a computer's MDM profile: POST /v4/computers-inventory/{id}/remove-mdm-profile.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function removeComputerInventoryMdmProfileV4(int|string $id, array $options = []): ?RemoveComputerMdmProfileResponse
    {
        return $this->fetch(new RemoveComputerInventoryMdmProfileV4Request($id, $options));
    }

    /**
     * Update specific fields on a computer: PATCH /v1/computers-inventory-detail/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateComputerInventoryDetailV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ComputerInventory
    {
        return $this->fetch(new UpdateComputerInventoryDetailV1Request($id, $body, $options));
    }

    /**
     * Update specific fields on a computer: PATCH /v2/computers-inventory-detail/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-11-06.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateComputerInventoryDetailV2(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdateComputerInventoryDetailV2Request($id, $body, $options));
    }

    /**
     * Update specific fields on a computer: PATCH /v3/computers-inventory-detail/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateComputerInventoryDetailV3(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdateComputerInventoryDetailV3Request($id, $body, $options));
    }

    /**
     * Update specific fields on a computer: PATCH /v4/computers-inventory-detail/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateComputerInventoryDetailV4(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdateComputerInventoryDetailV4Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
