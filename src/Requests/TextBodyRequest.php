<?php

namespace spkm\Jamf\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasStringBody;

/**
 * A POST or PUT carrying text that isn't JSON, such as a PEM certificate chain, with its content type.
 */
abstract class TextBodyRequest extends JamfRequest implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::POST;

    protected string $responseShape = self::RAW;

    protected bool $safe = false;

    protected string $contentType = 'text/plain';

    protected string $text = '';

    /** @var array<string, mixed> */
    protected array $options = [];

    protected function defaultBody(): string
    {
        return $this->text;
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return [...parent::defaultHeaders(), 'Content-Type' => $this->contentType];
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
