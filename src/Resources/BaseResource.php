<?php

namespace spkm\Jamf\Resources;

use JsonException;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Exceptions\NotFoundException;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\JamfApiException;
use spkm\Jamf\JamfConnector;
use spkm\Jamf\Requests\JamfRequest;

/**
 * What every resource shares: its connector, the model its records are returned as, and sending a request for its
 * model.
 *
 * @template TData of Data
 */
abstract class BaseResource
{
    /**
     * @param  class-string<TData>|null  $dataClass  The model records are returned as; null for arrays.
     */
    public function __construct(protected JamfConnector $connector, protected ?string $dataClass) {}

    public function connector(): JamfConnector
    {
        return $this->connector;
    }

    /**
     * Send a request and return what Jamf answered as the request's model (or models, arrays, text or null, by the
     * request's shape), throwing for an error status.
     */
    protected function fetch(JamfRequest $request): mixed
    {
        $response = $this->connector->send($request);

        if (! $response->successful()) {
            throw JamfApiException::fromResponse($response);
        }

        try {
            return $response->dto();
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }
    }

    /**
     * As fetch(), but null when Jamf has no such record.
     */
    protected function fetchOrNull(JamfRequest $request): mixed
    {
        try {
            return $this->fetch($request);
        } catch (NotFoundException) {
            return null;
        }
    }

    /**
     * As fetch(), for an operation whose answer is nothing: true once Jamf said it succeeded.
     */
    protected function perform(JamfRequest $request): bool
    {
        $this->fetch($request);

        return true;
    }

    /**
     * @param  array<string, mixed>|Data  $attributes
     * @return array<string, mixed>
     */
    protected function payloadOf(array|Data $attributes): array
    {
        return $attributes instanceof Data ? $attributes->toArray() : $attributes;
    }
}
