<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\LapsSettingsResponseV2;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update settings for LAPS: PUT /v2/local-admin-password/settings.
 */
class ReplaceLocalAdminPasswordSettingsV2Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = LapsSettingsResponseV2::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/settings';
    }
}
