<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Export Patch Reporting Data: GET /v2/patch-software-title-configurations/{id}/export-report.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetPatchSoftwareTitleConfigurationExportReportV2Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'text/csv';

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: filter, columns-to-export (required).
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-software-title-configurations/'.Path::segment((string) $this->id).'/export-report';
    }
}
