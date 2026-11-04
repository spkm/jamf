<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSoftwareTitleDefinition;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve Patch Software Title Definitions with the supplied id: GET /v3/patch-software-title-configurations/{id}/definitions.
 *
 * Retrieves patch software title definitions with the supplied id
 */
class GetPatchSoftwareTitleConfigurationDefinitionsV3Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = PatchSoftwareTitleDefinition::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v3/patch-software-title-configurations/'.Path::segment((string) $this->id).'/definitions';
    }
}
