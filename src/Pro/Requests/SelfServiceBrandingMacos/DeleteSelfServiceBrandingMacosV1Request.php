<?php

namespace spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete the Self Service macOS branding configuration indicated by the provided id: DELETE /v1/self-service/branding/macos/{id}.
 */
class DeleteSelfServiceBrandingMacosV1Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/self-service/branding/macos/'.Path::segment((string) $this->id);
    }
}
