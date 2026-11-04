<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\LapsUserPasswordResponseV2;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Set the LAPS password for a device: PUT /v2/local-admin-password/{clientManagementId}/set-password.
 */
class ReplaceLocalAdminPasswordSetPasswordV2Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = LapsUserPasswordResponseV2::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/'.Path::segment((string) $this->clientManagementId).'/set-password';
    }
}
