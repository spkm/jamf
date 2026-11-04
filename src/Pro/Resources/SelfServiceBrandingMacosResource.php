<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\MacOsBrandingConfiguration;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\CreateSelfServiceBrandingMacosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\DeleteSelfServiceBrandingMacosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\GetSelfServiceBrandingMacosByIdV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\GetSelfServiceBrandingMacosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\ReplaceSelfServiceBrandingMacosV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The self-service-branding-macos endpoints of the Jamf Pro API, from Jamf::selfServiceBrandingMacos().
 *
 * @extends Builder<MacOsBrandingConfiguration>
 */
class SelfServiceBrandingMacosResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, MacOsBrandingConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSelfServiceBrandingMacosV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetSelfServiceBrandingMacosByIdV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateSelfServiceBrandingMacosV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceSelfServiceBrandingMacosV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteSelfServiceBrandingMacosV1Request($id);
    }

    /**
     * Create a Self Service macOS branding configuration with the supplied: POST /v1/self-service/branding/macos.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSelfServiceBrandingMacosV1(array|JsonSerializable $body = [], array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateSelfServiceBrandingMacosV1Request($body, $options));
    }

    /**
     * Delete the Self Service macOS branding configuration indicated by the provided id: DELETE
     * /v1/self-service/branding/macos/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteSelfServiceBrandingMacosV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteSelfServiceBrandingMacosV1Request($id, $options));
    }

    /**
     * Read a single Self Service macOS branding configuration indicated by the provided id: GET
     * /v1/self-service/branding/macos/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSelfServiceBrandingMacosByIdV1(int|string $id, array $options = []): ?MacOsBrandingConfiguration
    {
        return $this->fetch(new GetSelfServiceBrandingMacosByIdV1Request($id, $options));
    }

    /**
     * Search for sorted and paged macOS branding configurations: GET /v1/self-service/branding/macos.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<MacOsBrandingConfiguration>
     */
    public function getSelfServiceBrandingMacosV1(): PagedResource
    {
        return new PagedResource($this->pro(), MacOsBrandingConfiguration::class, fn (Query $query) => new GetSelfServiceBrandingMacosV1Request($query));
    }

    /**
     * Update a Self Service macOS branding configuration with the supplied details: PUT
     * /v1/self-service/branding/macos/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSelfServiceBrandingMacosV1(int|string $id, array|JsonSerializable $body = [], array $options = []): ?MacOsBrandingConfiguration
    {
        return $this->fetch(new ReplaceSelfServiceBrandingMacosV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
