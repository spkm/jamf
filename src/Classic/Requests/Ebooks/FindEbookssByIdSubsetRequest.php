<?php

namespace spkm\Jamf\Classic\Requests\Ebooks;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for an ebook: GET /ebooks/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for an ebook specified with the {id} parameter. Lookup
 * by name is also supported. For example, /ebooks/id/3/subset/General&Location&Purchasing or
 * /ebooks/name/MyComputer/subset/Location&Purchasing.
 */
class FindEbookssByIdSubsetRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $subset, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/ebooks/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
