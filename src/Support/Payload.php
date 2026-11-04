<?php

namespace spkm\Jamf\Support;

use Illuminate\Support\Collection;
use JsonException;
use Saloon\Http\Response;
use spkm\Jamf\Data\Data;

/**
 * Reads what Jamf answered. The Jamf Pro API sends a record as JSON, and a page of a list as {"totalCount",
 * "results"}; the Classic API wraps a record in its kind ({"mobile_device": {...}}, {"mobile_devices": [...]}) and
 * answers a write with XML. Helpers take the response and give its records, its total, or a model.
 */
final class Payload
{
    /**
     * The decoded body (JSON, or XML as an array), or null when there is none.
     *
     * @throws JsonException When the body is neither.
     */
    public static function json(Response $response, bool $unwrap = false): mixed
    {
        $body = trim($response->body());

        if ($body === '') {
            return null;
        }

        $decoded = Xml::isXml($response) ? Xml::toArray($body) : json_decode($body, true, flags: JSON_THROW_ON_ERROR);

        return $unwrap ? self::unwrap($decoded) : $decoded;
    }

    /**
     * A Classic API answer without the key that names its kind: {"mobile_device": {...}} gives the record, and
     * {"mobile_devices": [...]} the list. Anything else is left as it is.
     */
    public static function unwrap(mixed $decoded): mixed
    {
        if (is_array($decoded) && count($decoded) === 1 && ! array_is_list($decoded)) {
            $inner = reset($decoded);

            if (is_array($inner)) {
                return $inner;
            }
        }

        return $decoded;
    }

    /**
     * The records in an answer: a page's results, a list, or the one record of an answer that is a record.
     *
     * @return list<array<string, mixed>>
     */
    public static function records(Response $response, bool $unwrap = false): array
    {
        $decoded = self::json($response, $unwrap);

        if (is_array($decoded) && ! array_is_list($decoded) && is_array($decoded['results'] ?? null)) {
            $decoded = $decoded['results'];
        }

        if (! is_array($decoded) || $decoded === []) {
            return [];
        }

        if (! array_is_list($decoded)) {
            return [$decoded];
        }

        return array_map(fn (mixed $item) => is_array($item) ? $item : ['value' => $item], $decoded);
    }

    /**
     * The records as the given model, or as arrays when there is none.
     *
     * @template TModel of Data
     *
     * @param  class-string<TModel>|null  $dto
     * @return ($dto is null ? Collection<int, array<string, mixed>> : Collection<int, TModel>)
     */
    public static function items(Response $response, ?string $dto, bool $unwrap = false): Collection
    {
        $records = collect(self::records($response, $unwrap));

        return $dto === null ? $records : $records->map(fn (array $record) => $dto::from($record));
    }

    /**
     * The one record in an answer as the given model (or as an array when there is none); the first of a list or
     * page; null for an empty answer.
     *
     * @template TModel of Data
     *
     * @param  class-string<TModel>|null  $dto
     * @return ($dto is null ? array<string, mixed>|null : TModel|null)
     */
    public static function object(Response $response, ?string $dto, bool $unwrap = false): mixed
    {
        $decoded = self::json($response, $unwrap);

        if (is_array($decoded) && (array_is_list($decoded) || is_array($decoded['results'] ?? null))) {
            $decoded = self::records($response, $unwrap)[0] ?? null;
        }

        if (! is_array($decoded)) {
            return null;
        }

        return $dto === null ? $decoded : $dto::from($decoded);
    }

    /**
     * How many records match in all, from a page's totalCount; null when the answer doesn't say.
     */
    public static function total(Response $response): ?int
    {
        $decoded = self::json($response);

        return is_array($decoded) && is_numeric($decoded['totalCount'] ?? null) ? (int) $decoded['totalCount'] : null;
    }
}
