<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use spkm\Jamf\Pro\Data\LapsPendingRotation;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get a list of the current devices and usernames with pending LAPS rotations: GET /v2/local-admin-password/pending-rotations.
 *
 * Return information about all devices and usernames currently in the state of a pending LAPS rotation
 */
class GetLocalAdminPasswordPendingRotationsV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LapsPendingRotation::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/pending-rotations';
    }
}
