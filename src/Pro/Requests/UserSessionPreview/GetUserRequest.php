<?php

namespace spkm\Jamf\Pro\Requests\UserSessionPreview;

use spkm\Jamf\Pro\Data\Account;
use spkm\Jamf\Requests\GetRequest;

/**
 * Return all Jamf Pro user acounts: GET /user.
 */
class GetUserRequest extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = Account::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user';
    }
}
