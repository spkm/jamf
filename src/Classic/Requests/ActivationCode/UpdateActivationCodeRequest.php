<?php

namespace spkm\Jamf\Classic\Requests\ActivationCode;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;

/**
 * Updates the Jamf Pro activation code: PUT /activationcode.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class UpdateActivationCodeRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'activation_code';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <activation_code>), or the XML itself.
     */
    public function __construct(array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/activationcode';
    }
}
