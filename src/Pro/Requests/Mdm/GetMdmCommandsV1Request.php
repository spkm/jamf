<?php

namespace spkm\Jamf\Pro\Requests\Mdm;

use spkm\Jamf\Pro\Data\MdmCommand;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get information about mdm commands made by Jamf Pro: GET /v1/mdm/commands.
 *
 * @deprecated Jamf deprecated this endpoint on 2023-10-16.
 */
class GetMdmCommandsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = MdmCommand::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: uuids, client-management-id.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mdm/commands';
    }
}
