<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\VolumePurchasingContent;
use spkm\Jamf\Pro\Data\VolumePurchasingLocation;
use spkm\Jamf\Pro\Data\VolumePurchasingLocationListView;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\CreateVolumePurchasingLocationHistoryV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\CreateVolumePurchasingLocationsV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\DeleteVolumePurchasingLocationV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\GetVolumePurchasingLocationContentV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\GetVolumePurchasingLocationHistoryV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\GetVolumePurchasingLocationsV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\GetVolumePurchasingLocationV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\ReclaimVolumePurchasingLocationV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\RevokeVolumePurchasingLocationLicensesV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\UpdateVolumePurchasingLocationV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The volume-purchasing-locations endpoints of the Jamf Pro API, from Jamf::volumePurchasingLocations().
 *
 * @extends Builder<VolumePurchasingLocationListView>
 */
class VolumePurchasingLocationsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, VolumePurchasingLocationListView::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetVolumePurchasingLocationsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetVolumePurchasingLocationV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateVolumePurchasingLocationsV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new UpdateVolumePurchasingLocationV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteVolumePurchasingLocationV1Request($id);
    }

    /**
     * Add specified Volume Purchasing Location history object notes: POST
     * /v1/volume-purchasing-locations/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createVolumePurchasingLocationHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateVolumePurchasingLocationHistoryV1Request($id, $body, $options));
    }

    /**
     * Create a Volume Purchasing Location: POST /v1/volume-purchasing-locations.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createVolumePurchasingLocationsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateVolumePurchasingLocationsV1Request($body, $options));
    }

    /**
     * Delete a Volume Purchasing Location with the supplied id: DELETE /v1/volume-purchasing-locations/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteVolumePurchasingLocationV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteVolumePurchasingLocationV1Request($id, $options));
    }

    /**
     * Retrieve the Volume Purchasing Content for the Volume Purchasing Location with the supplied id: GET
     * /v1/volume-purchasing-locations/{id}/content.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<VolumePurchasingContent>
     */
    public function getVolumePurchasingLocationContentV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), VolumePurchasingContent::class, fn (Query $query) => new GetVolumePurchasingLocationContentV1Request($id, $query));
    }

    /**
     * Get specified Volume Purchasing Location history object: GET /v1/volume-purchasing-locations/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getVolumePurchasingLocationHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetVolumePurchasingLocationHistoryV1Request($id, $query));
    }

    /**
     * Retrieve a Volume Purchasing Location with the supplied id: GET /v1/volume-purchasing-locations/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getVolumePurchasingLocationV1(int|string $id, array $options = []): ?VolumePurchasingLocation
    {
        return $this->fetch(new GetVolumePurchasingLocationV1Request($id, $options));
    }

    /**
     * Retrieve Volume Purchasing Locations: GET /v1/volume-purchasing-locations.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<VolumePurchasingLocationListView>
     */
    public function getVolumePurchasingLocationsV1(): PagedResource
    {
        return new PagedResource($this->pro(), VolumePurchasingLocationListView::class, fn (Query $query) => new GetVolumePurchasingLocationsV1Request($query));
    }

    /**
     * Reclaim a Volume Purchasing Location with the supplied id: POST /v1/volume-purchasing-locations/{id}/reclaim.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function reclaimVolumePurchasingLocationV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new ReclaimVolumePurchasingLocationV1Request($id, $options));
    }

    /**
     * Revoke licenses for a Volume Purchasing Location with the supplied id: POST
     * /v1/volume-purchasing-locations/{id}/revoke-licenses.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function revokeVolumePurchasingLocationLicensesV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new RevokeVolumePurchasingLocationLicensesV1Request($id, $options));
    }

    /**
     * Update a Volume Purchasing Location: PATCH /v1/volume-purchasing-locations/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateVolumePurchasingLocationV1(int|string $id, array|JsonSerializable $body, array $options = []): ?VolumePurchasingLocation
    {
        return $this->fetch(new UpdateVolumePurchasingLocationV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
