<?php

namespace spkm\Jamf\Requests;

use Saloon\Enums\Method;

/**
 * A POST, PUT or PATCH that does something without sending a body: a command, a refresh, a renewal. Jamf answers
 * with the outcome, or with nothing.
 */
abstract class ActionRequest extends JamfRequest
{
    protected Method $method = Method::POST;

    protected string $responseShape = self::RAW;

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
