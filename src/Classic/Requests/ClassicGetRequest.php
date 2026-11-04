<?php

namespace spkm\Jamf\Classic\Requests;

use Saloon\Enums\Method;

/**
 * A Classic API GET: a list of records (each an id and a name), one record, or a subset of one.
 */
abstract class ClassicGetRequest extends ClassicRequest
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
