<?php

namespace spkm\Jamf\Classic\Requests\ComputerCheckIn;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;

/**
 * Updates the Jamf Pro computer checkin information: PUT /computercheckin.
 */
class UpdateComputerCheckinRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'computer_check_in';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer_check_in>), or the XML itself.
     */
    public function __construct(array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computercheckin';
    }
}
