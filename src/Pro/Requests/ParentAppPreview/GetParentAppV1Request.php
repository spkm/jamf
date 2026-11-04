<?php

namespace spkm\Jamf\Pro\Requests\ParentAppPreview;

use spkm\Jamf\Pro\Data\ParentApp;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the current Jamf Parent app settings: GET /v1/parent-app.
 */
class GetParentAppV1Request extends GetRequest
{
    protected ?string $dto = ParentApp::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/parent-app';
    }
}
