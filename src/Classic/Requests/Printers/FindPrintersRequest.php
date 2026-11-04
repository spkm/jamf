<?php

namespace spkm\Jamf\Classic\Requests\Printers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all printers: GET /printers.
 */
class FindPrintersRequest extends ClassicGetRequest
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
        return '/printers';
    }
}
