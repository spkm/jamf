<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\User\ChangeUserPasswordV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The user endpoints of the Jamf Pro API, from Jamf::user().
 *
 * @extends BaseResource<Data>
 */
class UserResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Changes the user account password: POST /v1/user/change-password.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function changeUserPasswordV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new ChangeUserPasswordV1Request($body, $options));
    }
}
