<?php

namespace spkm\Jamf\Pro\Requests\SelfServiceBrandingIos;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete the Self Service iOS branding configuration indicated by the provided id: DELETE /v1/self-service/branding/ios/{id}.
 */
class DeleteSelfServiceBrandingIosV1Request extends DeleteRequest
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
        return '/v1/self-service/branding/ios/'.Path::segment((string) $this->id);
    }
}
