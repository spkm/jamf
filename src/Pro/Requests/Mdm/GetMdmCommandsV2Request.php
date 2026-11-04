<?php

namespace spkm\Jamf\Pro\Requests\Mdm;

use spkm\Jamf\Pro\Data\MdmCommand;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get information about mdm commands made by Jamf Pro: GET /v2/mdm/commands.
 */
class GetMdmCommandsV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = MdmCommand::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mdm/commands';
    }
}
