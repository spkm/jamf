<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\RemoveComputerMdmProfileResponse;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove a computer's MDM profile: POST /v1/computer-inventory/{id}/remove-mdm-profile.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class RemoveComputerInventoryMdmProfileV1Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = RemoveComputerMdmProfileResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-inventory/'.Path::segment((string) $this->id).'/remove-mdm-profile';
    }
}
