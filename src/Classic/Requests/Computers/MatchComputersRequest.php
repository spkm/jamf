<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Searches for computers that match the provided parameter: GET /computers/match/{match}.
 *
 * GET computers with a value equal to the {match} parameter.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class MatchComputersRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $match, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computers/match/'.Path::segment((string) $this->match);
    }
}
