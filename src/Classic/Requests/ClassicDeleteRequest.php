<?php

namespace spkm\Jamf\Classic\Requests;

use Saloon\Enums\Method;

/**
 * A Classic API DELETE of one record, or of the records a command or flush names.
 */
abstract class ClassicDeleteRequest extends ClassicRequest
{
    protected Method $method = Method::DELETE;

    protected string $responseShape = self::NONE;

    protected bool $safe = false;

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
