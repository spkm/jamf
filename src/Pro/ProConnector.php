<?php

namespace spkm\Jamf\Pro;

use JsonSerializable;
use Saloon\Enums\Method;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Data\Data;
use spkm\Jamf\JamfConnector;
use spkm\Jamf\JamfPaginator;
use spkm\Jamf\Pro\Resources\HasResources;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Requests\AdhocBodyRequest;
use spkm\Jamf\Requests\AdhocRequest;
use spkm\Jamf\Resources\AdhocResource;

/**
 * The connection to one server's Jamf Pro API (/api): a resource for every group of endpoints Jamf documents,
 * paging, ad-hoc calls for anything else, and the server's Classic API through classic().
 */
class ProConnector extends JamfConnector implements HasPagination
{
    use HasResources;

    protected ?ClassicConnector $classicConnector = null;

    /**
     * The API's root: the server's address with /api appended.
     */
    public function resolveBaseUrl(): string
    {
        return $this->baseUrl().'/api';
    }

    /**
     * The same server's Classic API (/JSSResource), signed in with the same credentials and sharing the token.
     */
    public function classic(): ClassicConnector
    {
        return $this->classicConnector ??= new ClassicConnector($this->credentials, $this);
    }

    protected function tokenConnector(): Connector
    {
        return $this;
    }

    /**
     * Page through a list request, $perPage records at a time (jamf.pagination.per_page by default, at most 2000).
     */
    public function paginate(Request $request, ?int $perPage = null): JamfPaginator
    {
        return new JamfPaginator($this, $request, $perPage ?? (int) config('jamf.pagination.per_page', 100));
    }

    /**
     * A query over a collection the package has no resource for, as Jamf::from('/v1/new-things'); its records are
     * arrays.
     *
     * @return Builder<Data>
     */
    public function from(string $path, Method $updateMethod = Method::PATCH): Builder
    {
        return new AdhocResource($this, $path, $updateMethod);
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function get(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::GET, $path, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function post(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::POST, $path, $body, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function put(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::PUT, $path, $body, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function patch(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::PATCH, $path, $body, $query));
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function delete(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::DELETE, $path, $query));
    }
}
