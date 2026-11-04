<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Searches for computers that match the provided name parameter: GET /computers/match/name/{matchname}.
 *
 * For example, /computers/match/name/Fred. A larger set of identifying information can be shown by requesting the
 * basic subset, for example /computers/match/name/Fred/subset/basic
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class MatchComputersNamesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $matchname, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computers/match/name/'.Path::segment((string) $this->matchname);
    }
}
