<?php

namespace spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement;

use spkm\Jamf\Pro\Data\DssDeclarations;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve an existing declaration: GET /v1/dss-declarations/{declarationId}.
 *
 * Retrieves a stored declaration based on the provided declaration id
 */
class GetDssDeclarationV1Request extends GetRequest
{
    protected ?string $dto = DssDeclarations::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $declarationId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/dss-declarations/'.Path::segment((string) $this->declarationId);
    }
}
