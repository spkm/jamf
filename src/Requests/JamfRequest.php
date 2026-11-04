<?php

namespace spkm\Jamf\Requests;

use Illuminate\Support\Facades\Cache;
use JsonException;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\JamfApiException;
use spkm\Jamf\JamfConnector;
use spkm\Jamf\Support\Payload;
use spkm\Jamf\Support\QueryString;
use Throwable;

/**
 * What every request to Jamf shares: the shape of the response and the model it maps to (for dto()), and optional
 * response caching.
 */
abstract class JamfRequest extends Request implements Cacheable
{
    use HasCaching;

    /** One record: a model, or an array when the request has none. */
    public const ONE = 'one';

    /** A list of records, or a page of them: a Collection of models, or of arrays. */
    public const LIST = 'list';

    /** The decoded body as it is. */
    public const RAW = 'raw';

    /** The body as a string: a CSV export, a certificate, an image. */
    public const TEXT = 'text';

    /** Nothing worth reading: dto() gives null. */
    public const NONE = 'none';

    protected string $responseShape = self::NONE;

    /** @var class-string<Data>|null */
    protected ?string $dto = null;

    protected bool $cacheable = false;

    protected bool $safe = true;

    /**
     * Whether the answer is wrapped in the name of its kind, as the Classic API's are.
     */
    protected bool $unwrap = false;

    /**
     * The content type to ask for, when it isn't JSON: text/csv for an export, a certificate's type, an image's.
     */
    protected ?string $accept = null;

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return $this->accept === null ? [] : ['Accept' => $this->accept];
    }

    public function resolveCacheDriver(): Driver
    {
        return new LaravelCacheDriver(Cache::store(config('jamf.cache.store')));
    }

    public function cacheExpiryInSeconds(): int
    {
        return (int) config('jamf.cache.seconds', 3600);
    }

    /**
     * @return array<Method>
     */
    protected function getCacheableMethods(): array
    {
        return $this->cacheable && config('jamf.cache.enabled') ? [Method::GET] : [];
    }

    /**
     * One entry per server and credentials, so what one account fetched is never served to another, and per query
     * as it is sent.
     */
    protected function cacheKey(PendingRequest $pendingRequest): string
    {
        $connector = $pendingRequest->getConnector();
        $identity = $connector instanceof JamfConnector ? $connector->credentialsFingerprint() : $connector::class;

        return 'jamf.response.'.sha1($identity.' '.$pendingRequest->getMethod()->value.' '.$pendingRequest->getUrl().' '.QueryString::encode($pendingRequest->query()->all()));
    }

    /**
     * The exception for an error answer, so that $response->throw() (and the paginator, which calls it) gives Jamf's
     * own exception classes rather than Saloon's.
     */
    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        return JamfApiException::fromResponse($response);
    }

    /**
     * Whether the request can be retried: a GET that changes nothing.
     */
    public function isSafe(): bool
    {
        return $this->safe && $this->getMethod() === Method::GET;
    }

    /**
     * @return class-string<Data>|null
     */
    public function dtoClass(): ?string
    {
        return $this->dto;
    }

    public function responseShape(): string
    {
        return $this->responseShape;
    }

    public function unwraps(): bool
    {
        return $this->unwrap;
    }

    /**
     * The response as the request's model (or models, or arrays for a request without one; or the body as a string
     * for a file), null for an answer without a body, or a JamfApiException for an error status.
     */
    public function createDtoFromResponse(Response $response): mixed
    {
        if (! $response->successful()) {
            throw JamfApiException::fromResponse($response);
        }

        if ($this->responseShape === self::TEXT) {
            return $response->body();
        }

        if (trim($response->body()) === '') {
            return null;
        }

        try {
            return match ($this->responseShape) {
                self::ONE => Payload::object($response, $this->dto, $this->unwrap),
                self::LIST => Payload::items($response, $this->dto, $this->unwrap),
                self::RAW => Payload::json($response, $this->unwrap),
                default => null,
            };
        } catch (JsonException) {
            // A successful status with something other than JSON or XML, such as a proxy's or maintenance page.
            throw new ServerErrorException($response);
        }
    }
}
