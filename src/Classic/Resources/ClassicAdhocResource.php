<?php

namespace spkm\Jamf\Classic\Resources;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicAdhocBodyRequest;
use spkm\Jamf\Classic\Requests\ClassicAdhocRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Support\Path;

/**
 * A Classic API collection the package has no resource for, from Jamf::classic()->from('/path', 'root'), laid out
 * the way the Classic API's collections are: listed at /path, found, updated and deleted at /path/id/{id}, and
 * created at /path/id/0.
 */
class ClassicAdhocResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector, protected string $path, protected string $root)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new ClassicAdhocRequest(Method::GET, $this->path, shape: ClassicRequest::LIST);
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new ClassicAdhocRequest(Method::GET, $this->item($id), shape: ClassicRequest::ONE);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new ClassicAdhocBodyRequest(Method::POST, $this->item(0), $record, shape: ClassicRequest::ONE, root: $this->root);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new ClassicAdhocBodyRequest(Method::PUT, $this->item($id), $record, shape: ClassicRequest::ONE, root: $this->root);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new ClassicAdhocRequest(Method::DELETE, $this->item($id), shape: ClassicRequest::NONE);
    }

    private function item(int|string $id): string
    {
        return rtrim($this->path, '/').'/id/'.Path::segment((string) $id);
    }
}
