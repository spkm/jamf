<?php

namespace spkm\Jamf\Requests;

use Saloon\Enums\Method;

/**
 * A GET for one record, a list Jamf answers whole, a setting, or a file, with any query options the endpoint
 * documents.
 */
abstract class GetRequest extends JamfRequest
{
    protected Method $method = Method::GET;

    protected string $responseShape = self::ONE;

    protected bool $cacheable = true;

    /** @var array<string, mixed> */
    protected array $options = [];

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
