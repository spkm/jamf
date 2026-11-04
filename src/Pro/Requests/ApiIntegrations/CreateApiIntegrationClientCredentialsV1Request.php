<?php

namespace spkm\Jamf\Pro\Requests\ApiIntegrations;

use spkm\Jamf\Pro\Data\OAuthClientCredentials;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Create client credentials for specified API integration: POST /v1/api-integrations/{id}/client-credentials.
 */
class CreateApiIntegrationClientCredentialsV1Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = OAuthClientCredentials::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/api-integrations/'.Path::segment((string) $this->id).'/client-credentials';
    }
}
