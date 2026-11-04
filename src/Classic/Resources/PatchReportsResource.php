<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\PatchReports\FindComputersByTitleVersionRequest;
use spkm\Jamf\Classic\Requests\PatchReports\FindPatchReportsByPatchSoftwareTitleIdRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The patchreports endpoints of the Classic API, from Jamf::classic()->patchReports().
 *
 * @extends BaseResource<never>
 */
class PatchReportsResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Display computers for a specific version of a patch report: GET
     * /patchreports/patchsoftwaretitleid/{id}/version/{version}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersByTitleVersion(int|string $id, string $version, array $options = []): mixed
    {
        return $this->fetch(new FindComputersByTitleVersionRequest($id, $version, $options));
    }

    /**
     * Finds patch reports by patch software title id: GET /patchreports/patchsoftwaretitleid/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchReportsByPatchSoftwareTitleId(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPatchReportsByPatchSoftwareTitleIdRequest($id, $options));
    }
}
