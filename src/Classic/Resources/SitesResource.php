<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Sites\CreateSiteByIdRequest;
use spkm\Jamf\Classic\Requests\Sites\DeleteSiteByIdRequest;
use spkm\Jamf\Classic\Requests\Sites\FindSitesByIdRequest;
use spkm\Jamf\Classic\Requests\Sites\FindSitesByNameRequest;
use spkm\Jamf\Classic\Requests\Sites\FindSitesRequest;
use spkm\Jamf\Classic\Requests\Sites\UpdateSiteByIdRequest;

/**
 * The sites endpoints of the Classic API, from Jamf::classic()->sites().
 */
class SitesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindSitesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindSitesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateSiteByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateSiteByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteSiteByIdRequest($id);
    }

    /**
     * Creates a new site by id: POST /sites/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <site>), or the XML itself.
     */
    public function createSiteById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateSiteByIdRequest($id, $record));
    }

    /**
     * Deletes a site by id: DELETE /sites/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteSiteById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteSiteByIdRequest($id, $options));
    }

    /**
     * Finds all sites: GET /sites.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findSites(array $options = []): Collection
    {
        return $this->fetch(new FindSitesRequest($options));
    }

    /**
     * Finds sites by id: GET /sites/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findSitesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindSitesByIdRequest($id, $options));
    }

    /**
     * Finds sites by name: GET /sites/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findSitesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindSitesByNameRequest($name, $options));
    }

    /**
     * Updates an existing site by id: PUT /sites/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <site>), or the XML itself.
     */
    public function updateSiteById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateSiteByIdRequest($id, $record));
    }
}
