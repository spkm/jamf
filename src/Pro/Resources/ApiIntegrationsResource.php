<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ApiIntegrationResponse;
use spkm\Jamf\Pro\Data\OAuthClientCredentials;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ApiIntegrations\CreateApiIntegrationClientCredentialsV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\CreateApiIntegrationsV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\DeleteApiIntegrationV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\GetApiIntegrationsV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\GetApiIntegrationV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\ReplaceApiIntegrationV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The api-integrations endpoints of the Jamf Pro API, from Jamf::apiIntegrations().
 *
 * @extends Builder<ApiIntegrationResponse>
 */
class ApiIntegrationsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ApiIntegrationResponse::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApiIntegrationsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetApiIntegrationV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateApiIntegrationsV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceApiIntegrationV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteApiIntegrationV1Request($id);
    }

    /**
     * Create client credentials for specified API integration: POST /v1/api-integrations/{id}/client-credentials.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createApiIntegrationClientCredentialsV1(int|string $id, array $options = []): ?OAuthClientCredentials
    {
        return $this->fetch(new CreateApiIntegrationClientCredentialsV1Request($id, $options));
    }

    /**
     * Create API integration object: POST /v1/api-integrations.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createApiIntegrationsV1(array|JsonSerializable $body, array $options = []): ?ApiIntegrationResponse
    {
        return $this->fetch(new CreateApiIntegrationsV1Request($body, $options));
    }

    /**
     * Remove specified API integration: DELETE /v1/api-integrations/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteApiIntegrationV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteApiIntegrationV1Request($id, $options));
    }

    /**
     * Get specified API integration object: GET /v1/api-integrations/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getApiIntegrationV1(int|string $id, array $options = []): ?ApiIntegrationResponse
    {
        return $this->fetch(new GetApiIntegrationV1Request($id, $options));
    }

    /**
     * Get the current API Integrations: GET /v1/api-integrations.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ApiIntegrationResponse>
     */
    public function getApiIntegrationsV1(): PagedResource
    {
        return new PagedResource($this->pro(), ApiIntegrationResponse::class, fn (Query $query) => new GetApiIntegrationsV1Request($query));
    }

    /**
     * Update specified API integration object: PUT /v1/api-integrations/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceApiIntegrationV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ApiIntegrationResponse
    {
        return $this->fetch(new ReplaceApiIntegrationV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
