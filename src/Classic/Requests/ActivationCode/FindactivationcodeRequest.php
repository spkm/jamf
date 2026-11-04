<?php

namespace spkm\Jamf\Classic\Requests\ActivationCode;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds the Jamf Pro activation code: GET /activationcode.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class FindactivationcodeRequest extends ClassicGetRequest
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
        return '/activationcode';
    }
}
