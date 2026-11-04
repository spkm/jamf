<?php

namespace spkm\Jamf\Requests;

use JsonSerializable;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;
use Saloon\Repositories\Body\JsonBodyRepository;
use Saloon\Traits\Body\HasJsonBody;

/**
 * A POST, PUT or PATCH carrying JSON: a record as an array of Jamf's field names or a model, or a list (the ids a
 * bulk operation takes). Jamf answers with the record as stored, a link to it, or nothing.
 */
abstract class WriteRequest extends JamfRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected string $responseShape = self::RAW;

    protected bool $safe = false;

    /** @var array<mixed>|JsonSerializable */
    protected array|JsonSerializable $record = [];

    /** @var array<string, mixed> */
    protected array $options = [];

    /**
     * Whether the endpoint takes a JSON list rather than an object, so that an empty body is sent as [] not {}.
     */
    protected bool $listBody = false;

    /**
     * Sends an empty body as {}: Jamf reads an endpoint's body as an object, and refuses [].
     */
    public function boot(PendingRequest $pendingRequest): void
    {
        $body = $pendingRequest->body();

        if (! $this->listBody && $body instanceof JsonBodyRepository && $body->isEmpty()) {
            $body->setJsonFlags($body->getJsonFlags() | JSON_FORCE_OBJECT);
        }
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->record instanceof JsonSerializable ? (array) $this->record->jsonSerialize() : $this->record;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
