<?php

namespace spkm\Jamf\Classic\Requests\RemovableMacAddresses;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all removablemacaddresses: GET /removablemacaddresses.
 */
class FindRemovableMacAddressesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/removablemacaddresses';
    }
}
