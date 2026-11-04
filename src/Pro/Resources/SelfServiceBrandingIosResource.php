<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\IosBrandingConfiguration;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\CreateSelfServiceBrandingIosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\DeleteSelfServiceBrandingIosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\GetSelfServiceBrandingIosByIdV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\GetSelfServiceBrandingIosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\ReplaceSelfServiceBrandingIosV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The self-service-branding-ios endpoints of the Jamf Pro API, from Jamf::selfServiceBrandingIos().
 *
 * @extends Builder<IosBrandingConfiguration>
 */
class SelfServiceBrandingIosResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, IosBrandingConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSelfServiceBrandingIosV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetSelfServiceBrandingIosByIdV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateSelfServiceBrandingIosV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceSelfServiceBrandingIosV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteSelfServiceBrandingIosV1Request($id);
    }

    /**
     * Create a Self Service iOS branding configuration with the supplied: POST /v1/self-service/branding/ios.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSelfServiceBrandingIosV1(array|JsonSerializable $body = [], array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateSelfServiceBrandingIosV1Request($body, $options));
    }

    /**
     * Delete the Self Service iOS branding configuration indicated by the provided id: DELETE
     * /v1/self-service/branding/ios/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteSelfServiceBrandingIosV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteSelfServiceBrandingIosV1Request($id, $options));
    }

    /**
     * Read a single Self Service iOS branding configuration indicated by the provided id: GET
     * /v1/self-service/branding/ios/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSelfServiceBrandingIosByIdV1(int|string $id, array $options = []): ?IosBrandingConfiguration
    {
        return $this->fetch(new GetSelfServiceBrandingIosByIdV1Request($id, $options));
    }

    /**
     * Search for sorted and paged iOS branding configurations: GET /v1/self-service/branding/ios.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<IosBrandingConfiguration>
     */
    public function getSelfServiceBrandingIosV1(): PagedResource
    {
        return new PagedResource($this->pro(), IosBrandingConfiguration::class, fn (Query $query) => new GetSelfServiceBrandingIosV1Request($query));
    }

    /**
     * Update a Self Service iOS branding configuration with the supplied details: PUT
     * /v1/self-service/branding/ios/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSelfServiceBrandingIosV1(int|string $id, array|JsonSerializable $body = [], array $options = []): ?IosBrandingConfiguration
    {
        return $this->fetch(new ReplaceSelfServiceBrandingIosV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
