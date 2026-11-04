<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryRecoveryLockPasswordResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return a Computers Recovery Lock Password: GET /v1/computers-inventory/{id}/view-recovery-lock-password.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetComputerInventoryViewRecoveryLockPasswordV1Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryRecoveryLockPasswordResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computers-inventory/'.Path::segment((string) $this->id).'/view-recovery-lock-password';
    }
}
