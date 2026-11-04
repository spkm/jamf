<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\AdvancedUserContentSearch;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\CreateAdvancedUserContentSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\DeleteAdvancedUserContentSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\GetAdvancedUserContentSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\GetAdvancedUserContentSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\ReplaceAdvancedUserContentSearchV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The advanced-user-content-searches endpoints of the Jamf Pro API, from Jamf::advancedUserContentSearches().
 *
 * @extends BaseResource<Data>
 */
class AdvancedUserContentSearchesResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create Advanced User Content Search object: POST /v1/advanced-user-content-searches.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createAdvancedUserContentSearchesV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateAdvancedUserContentSearchesV1Request($body, $options));
    }

    /**
     * Remove specified Advanced User Content Search object: DELETE /v1/advanced-user-content-searches/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAdvancedUserContentSearchV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAdvancedUserContentSearchV1Request($id, $options));
    }

    /**
     * Get Specified Advanced User Content Search object: GET /v1/advanced-user-content-searches/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAdvancedUserContentSearchV1(int|string $id, array $options = []): ?AdvancedUserContentSearch
    {
        return $this->fetch(new GetAdvancedUserContentSearchV1Request($id, $options));
    }

    /**
     * Get All Advanced User Content Search objects: GET /v1/advanced-user-content-searches.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, AdvancedUserContentSearch>
     */
    public function getAdvancedUserContentSearchesV1(array $options = []): Collection
    {
        return $this->fetch(new GetAdvancedUserContentSearchesV1Request($options));
    }

    /**
     * Get Specified Advanced User Content Search object: PUT /v1/advanced-user-content-searches/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceAdvancedUserContentSearchV1(int|string $id, array|JsonSerializable $body, array $options = []): ?AdvancedUserContentSearch
    {
        return $this->fetch(new ReplaceAdvancedUserContentSearchV1Request($id, $body, $options));
    }
}
