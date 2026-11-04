<?php

namespace spkm\Jamf\Support;

use InvalidArgumentException;

/**
 * Writes the parts of a request path safely: a value that goes in the path is encoded, and one that would change
 * which endpoint is called ('', '.' or '..', which the HTTP client would collapse into the parent path) is refused.
 */
final class Path
{
    /**
     * One segment of a path, from a value such as a serial number or a name. A comma is left as it is, for the
     * Classic API's lists of ids (1,2,3).
     */
    public static function segment(string $value): string
    {
        if (trim($value) === '' || $value === '.' || $value === '..') {
            throw new InvalidArgumentException('"'.$value.'" cannot be used in a request path.');
        }

        return str_replace('%2C', ',', rawurlencode($value));
    }

    /**
     * A path given by the caller, as Jamf::get('/v1/buildings/5') takes one: each segment is checked, and a query
     * string is left alone for the connector to merge.
     */
    public static function path(string $path): string
    {
        [$route, $query] = array_pad(explode('?', $path, 2), 2, null);

        foreach (explode('/', $route) as $segment) {
            if ($segment === '.' || $segment === '..') {
                throw new InvalidArgumentException('"'.$path.'" is not a path Jamf serves.');
            }
        }

        return '/'.ltrim($route, '/').($query === null ? '' : '?'.$query);
    }
}
