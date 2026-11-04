<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\RemoveComputerMdmProfileResponse;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove a computer's MDM profile: POST /v4/computers-inventory/{id}/remove-mdm-profile.
 */
class RemoveComputerInventoryMdmProfileV4Request extends ActionRequest
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
        return '/v4/computers-inventory/'.Path::segment((string) $this->id).'/remove-mdm-profile';
    }
}
