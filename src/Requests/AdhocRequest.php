<?php

namespace spkm\Jamf\Requests;

use Saloon\Enums\Method;
use spkm\Jamf\Support\Path;

/**
 * Any call to the Jamf Pro API by method and path, for endpoints the package has no request for. dto() gives the
 * decoded body, or one record as an array when built with the ONE shape. AdhocBodyRequest carries a JSON body too.
 */
class AdhocRequest extends JamfRequest
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
