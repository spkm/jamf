<?php

namespace spkm\Jamf;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use spkm\Jamf\Exceptions\InvalidRequestException;
use spkm\Jamf\Exceptions\NotFoundException;
use spkm\Jamf\Exceptions\RateLimitedException;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\Exceptions\UnauthorizedException;

/**
 * An error Jamf answered with. The Jamf Pro API explains one as {"httpStatus", "errors": [{"code", "description",
 * "field"}]}, its token endpoint as {"error", "error_description"}, and the Classic API with an HTML page.
 */
class JamfApiException extends RequestException
{
    public function __construct(Response $response)
    {
        parent::__construct($response, $this->describe($response));
    }

    /**
     * The exception for Jamf's answer: a subclass for the errors callers handle differently.
     */
    public static function fromResponse(Response $response): self
    {
        $status = $response->status();

        return match (true) {
            $status === 404 => new NotFoundException($response),
            in_array($status, [401, 403], true) => new UnauthorizedException($response),
            $status === 429 => new RateLimitedException($response),
            in_array($status, [400, 405, 406, 409, 412, 415, 422], true) => new InvalidRequestException($response),
            $status === 408 || $response->serverError() || $response->successful() => new ServerErrorException($response),
            default => new self($response),
        };
    }

    /**
     * The causes the Jamf Pro API gave, each with its code, description and the field it concerns (when it named
     * one). Empty for an answer without them.
     *
     * @return list<array{code: ?string, description: ?string, field: ?string}>
     */
    public function errors(): array
    {
        $body = json_decode($this->getResponse()->body(), true);
        $causes = is_array($body) && is_array($body['errors'] ?? null) ? $body['errors'] : [];
        $errors = [];

        foreach ($causes as $cause) {
            if (is_array($cause)) {
                $errors[] = [
                    'code' => self::text($cause['code'] ?? null),
                    'description' => self::text($cause['description'] ?? null),
                    'field' => self::text($cause['field'] ?? null),
                ];
            }
        }

        return $errors;
    }

    protected function describe(Response $response): string
    {
        $text = 'Jamf responded '.$response->status().' to '.self::requestLine($response);
        $page = self::htmlMessage($response);

        if ($page !== null) {
            return $text.($page !== '' ? ": $page" : ' with an HTML '.($response->successful() ? 'page instead of JSON' : 'error page'));
        }

        if ($response->body() !== '' && ! json_validate($response->body())) {
            return $response->successful() ? $text.' with a body that is not JSON' : $text.': '.self::clean($response->body());
        }

        $message = self::messageIn($response);

        return $text.($message !== null ? ": $message" : '');
    }

    /**
     * The failed request's method and path, without its query string.
     */
    protected static function requestLine(Response $response): string
    {
        $pendingRequest = $response->getPendingRequest();

        return $pendingRequest->getMethod()->value.' '.(parse_url($pendingRequest->getUrl(), PHP_URL_PATH) ?: '/');
    }

    /**
     * What an HTML page says: the Classic API's "Error: ..." paragraph, else its first two paragraphs (the status
     * and what it means, such as "Unauthorized: The request requires user authentication"), else the page's title
     * ('' when it has none). Null when Jamf didn't send HTML.
     */
    private static function htmlMessage(Response $response): ?string
    {
        $body = $response->body();

        if (! str_contains(strtolower((string) $response->header('Content-Type')), 'html') && ! str_starts_with(strtolower(ltrim($body)), '<html') && ! str_starts_with(strtolower(ltrim($body)), '<!doctype html')) {
            return null;
        }

        if (preg_match_all('#<p\b[^>]*>(.*?)</p>#is', $body, $paragraphs)) {
            $texts = array_values(array_filter(array_map(fn (string $paragraph) => self::clean(html_entity_decode($paragraph)), $paragraphs[1])));

            foreach ($texts as $text) {
                if (stripos($text, 'error') === 0) {
                    return rtrim(trim((string) preg_replace('/^error:?/i', '', $text)), '.');
                }
            }

            $texts = array_filter($texts, fn (string $text) => stripos($text, 'You can get technical details') !== 0);

            if ($texts !== []) {
                return self::clean(rtrim(implode(': ', array_slice($texts, 0, 2)), '.'));
            }
        }

        return preg_match('#<title>(.*?)</title>#is', $body, $matches) ? self::clean(html_entity_decode($matches[1])) : '';
    }

    /**
     * What Jamf said: the descriptions of the causes it gave, or for its token endpoint and anything else the
     * error, message or description the body carries. Null when it said nothing the package can read.
     */
    private static function messageIn(Response $response): ?string
    {
        $body = json_decode($response->body(), true);

        if (! is_array($body) || array_is_list($body)) {
            return null;
        }

        $causes = [];

        foreach (is_array($body['errors'] ?? null) ? $body['errors'] : [] as $cause) {
            $description = is_array($cause) ? self::text(self::sentence($cause['description'] ?? $cause['code'] ?? null)) : null;

            if ($description !== null) {
                $field = self::text($cause['field'] ?? null);
                $causes[] = $field !== null ? "$field: $description" : $description;
            }
        }

        if ($causes !== []) {
            return self::clean(implode('; ', array_unique($causes)));
        }

        foreach (['error_description', 'message', 'error', 'detail', 'description'] as $key) {
            $value = self::text(self::sentence($body[$key] ?? null));

            if ($value !== null) {
                return $value;
            }
        }

        return null;
    }

    /**
     * A message without its closing full stop, before it is cleaned, so the "..." of a cut message stays.
     */
    private static function sentence(mixed $value): mixed
    {
        return is_string($value) ? rtrim($value, '.') : $value;
    }

    private static function text(mixed $value): ?string
    {
        return is_scalar($value) && trim((string) $value) !== '' ? self::clean((string) $value) : null;
    }

    /**
     * Server text fit for a message or a log line: tags and control characters out, one line, at most 200
     * characters.
     */
    private static function clean(string $value): string
    {
        $value = trim((string) preg_replace('/\s+/u', ' ', (string) preg_replace('/[\x00-\x1F\x7F]+/u', ' ', strip_tags($value))));

        return mb_strlen($value) > 200 ? mb_substr($value, 0, 197).'...' : $value;
    }
}
