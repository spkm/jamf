<?php

namespace spkm\Jamf\Classic\Requests\Peripherals;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all peripherals: GET /peripherals.
 */
class FindPeripheralsRequest extends ClassicGetRequest
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
        return '/peripherals';
    }
}
