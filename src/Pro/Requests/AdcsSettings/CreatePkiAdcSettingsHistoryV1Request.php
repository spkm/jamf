<?php

namespace spkm\Jamf\Pro\Requests\AdcsSettings;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Add specified AD CS Settings object note: POST /v1/pki/adcs-settings/{id}/history.
 *
 * Adds specified AD CS Settings object note.
 */
class CreatePkiAdcSettingsHistoryV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/adcs-settings/'.Path::segment((string) $this->id).'/history';
    }
}
