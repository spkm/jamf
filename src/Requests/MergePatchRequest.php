<?php

namespace spkm\Jamf\Requests;

use Saloon\Enums\Method;

/**
 * A PATCH (or PUT) carrying a JSON merge patch (RFC 7396): the fields to change, with null for a field to clear.
 */
abstract class MergePatchRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return [...parent::defaultHeaders(), 'Content-Type' => 'application/merge-patch+json'];
    }
}
