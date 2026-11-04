<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ActivationCode\FindactivationcodeRequest;
use spkm\Jamf\Classic\Requests\ActivationCode\UpdateActivationCodeRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The activationcode endpoints of the Classic API, from Jamf::classic()->activationCode().
 */
class ActivationCodeResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindactivationcodeRequest;
    }

    /**
     * Finds the Jamf Pro activation code: GET /activationcode.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findactivationcode(array $options = []): Collection
    {
        return $this->fetch(new FindactivationcodeRequest($options));
    }

    /**
     * Updates the Jamf Pro activation code: PUT /activationcode.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-07-14.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <activation_code>), or the XML itself.
     */
    public function updateActivationCode(array|string $record = []): mixed
    {
        return $this->fetch(new UpdateActivationCodeRequest($record));
    }
}
