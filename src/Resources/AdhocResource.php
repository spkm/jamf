<?php

namespace spkm\Jamf\Resources;

use Saloon\Enums\Method;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\AdhocBodyRequest;
use spkm\Jamf\Requests\AdhocListRequest;
use spkm\Jamf\Requests\AdhocRequest;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * A builder over a Jamf Pro collection the package has no resource for, from Jamf::from('/v1/path'); its records
 * are arrays, listed and created at /path, and found, updated (PATCH, or PUT where told) and deleted at
 * /path/{id}, the way Jamf's newer collections are laid out.
 *
 * @extends Builder<Data>
 */
class AdhocResource extends Builder
{
    public function __construct(ProConnector $connector, protected string $path, protected Method $updateMethod = Method::PATCH)
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new AdhocListRequest($this->path, $query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new AdhocRequest(Method::GET, $this->item($id), shape: JamfRequest::ONE);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new AdhocBodyRequest(Method::POST, $this->path, $body, shape: JamfRequest::ONE);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new AdhocBodyRequest($this->updateMethod, $this->item($id), $body, shape: JamfRequest::ONE);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new AdhocRequest(Method::DELETE, $this->item($id), shape: JamfRequest::NONE);
    }

    private function item(int|string $id): string
    {
        return rtrim($this->path, '/').'/'.Path::segment((string) $id);
    }
}
