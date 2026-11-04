<?php

namespace spkm\Jamf\Classic\Requests;

use Saloon\Enums\Method;
use spkm\Jamf\Support\Path;

/**
 * Any call to the Classic API by method and path, for endpoints the package has no request for. dto() gives the
 * decoded answer without the key that names its kind.
 */
class ClassicAdhocRequest extends ClassicRequest
{
    /**
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(
        protected Method $method,
        protected string $path,
        protected array $parameters = [],
        string $shape = self::RAW,
    ) {
        $this->responseShape = $shape;
        $this->safe = $method === Method::GET;
    }

    public function resolveEndpoint(): string
    {
        return Path::path($this->path);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->parameters;
    }
}
