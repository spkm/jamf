<?php

namespace spkm\Jamf\Classic\Requests\DistributionPoints;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing distribution point by id: PUT /distributionpoints/id/{id}.
 */
class UpdateDistributionPointByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'distribution_point';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <distribution_point>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/distributionpoints/id/'.Path::segment((string) $this->id);
    }
}
