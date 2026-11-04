<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSoftwareTitleReport;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve Patch Software Title Configuration Patch Report: GET /v2/patch-software-title-configurations/{id}/patch-report.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetPatchSoftwareTitleConfigurationPatchReportV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = PatchSoftwareTitleReport::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-software-title-configurations/'.Path::segment((string) $this->id).'/patch-report';
    }
}
