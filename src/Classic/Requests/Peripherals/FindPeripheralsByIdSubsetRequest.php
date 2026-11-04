<?php

namespace spkm\Jamf\Classic\Requests\Peripherals;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a peripheral: GET /peripherals/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a peripheral specified with the {id} parameter. For
 * example, /peripheral/id/3/subset/General&Location&Purchasing.
 */
class FindPeripheralsByIdSubsetRequest extends ClassicGetRequest
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
        return '/peripherals/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
