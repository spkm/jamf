<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\AdvancedSearch;
use spkm\Jamf\Pro\Data\AdvancedSearchCriteriaChoices;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\CreateAdvancedMobileDeviceSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\DeleteAdvancedMobileDeviceSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\DeleteMultipleAdvancedMobileDeviceSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchesChoicesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\ReplaceAdvancedMobileDeviceSearchV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The advanced-mobile-device-searches endpoints of the Jamf Pro API, from Jamf::advancedMobileDeviceSearches().
 *
 * @extends BaseResource<Data>
 */
class AdvancedMobileDeviceSearchesResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create Advanced Search object: POST /v1/advanced-mobile-device-searches.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createAdvancedMobileDeviceSearchesV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateAdvancedMobileDeviceSearchesV1Request($body, $options));
    }

    /**
     * Remove specified Advanced Search object: DELETE /v1/advanced-mobile-device-searches/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAdvancedMobileDeviceSearchV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAdvancedMobileDeviceSearchV1Request($id, $options));
    }

    /**
     * Remove specified Advanced Search objects: POST /v1/advanced-mobile-device-searches/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleAdvancedMobileDeviceSearchesV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleAdvancedMobileDeviceSearchesV1Request($body, $options));
    }

    /**
     * Get specified Advanced Search object: GET /v1/advanced-mobile-device-searches/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAdvancedMobileDeviceSearchV1(int|string $id, array $options = []): ?AdvancedSearch
    {
        return $this->fetch(new GetAdvancedMobileDeviceSearchV1Request($id, $options));
    }

    /**
     * Get Mobile Device Advanced Search criteria choices: GET /v1/advanced-mobile-device-searches/choices.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: criteria (required), site, contains.
     */
    public function getAdvancedMobileDeviceSearchesChoicesV1(array $options = []): ?AdvancedSearchCriteriaChoices
    {
        return $this->fetch(new GetAdvancedMobileDeviceSearchesChoicesV1Request($options));
    }

    /**
     * Get Advanced Search objects: GET /v1/advanced-mobile-device-searches.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, AdvancedSearch>
     */
    public function getAdvancedMobileDeviceSearchesV1(array $options = []): Collection
    {
        return $this->fetch(new GetAdvancedMobileDeviceSearchesV1Request($options));
    }

    /**
     * Get specified Advanced Search object: PUT /v1/advanced-mobile-device-searches/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceAdvancedMobileDeviceSearchV1(int|string $id, array|JsonSerializable $body, array $options = []): ?AdvancedSearch
    {
        return $this->fetch(new ReplaceAdvancedMobileDeviceSearchV1Request($id, $body, $options));
    }
}
