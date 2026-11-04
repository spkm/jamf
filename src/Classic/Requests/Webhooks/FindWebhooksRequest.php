<?php

namespace spkm\Jamf\Classic\Requests\Webhooks;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all webhooks: GET /webhooks.
 */
class FindWebhooksRequest extends ClassicGetRequest
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
        return '/webhooks';
    }
}
