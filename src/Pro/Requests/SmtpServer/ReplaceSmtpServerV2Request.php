<?php

namespace spkm\Jamf\Pro\Requests\SmtpServer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\SmtpServerV2;
use spkm\Jamf\Requests\MergePatchRequest;

/**
 * Updates Jamf Pro SMTP Server information: PUT /v2/smtp-server.
 */
class ReplaceSmtpServerV2Request extends MergePatchRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = SmtpServerV2::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options Jamf documents: oauth-state.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/smtp-server';
    }
}
