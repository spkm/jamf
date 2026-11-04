<?php

namespace spkm\Jamf\Requests;

use Saloon\Enums\Method;

/**
 * A DELETE of one record or setting. Jamf answers with nothing.
 */
abstract class DeleteRequest extends JamfRequest
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
