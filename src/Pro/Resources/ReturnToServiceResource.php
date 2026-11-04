<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ReturnToServiceConfiguration;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ReturnToService\CreateReturnToServiceV1Request;
use spkm\Jamf\Pro\Requests\ReturnToService\DeleteReturnToServiceV1Request;
use spkm\Jamf\Pro\Requests\ReturnToService\GetReturnToServiceByIdV1Request;
use spkm\Jamf\Pro\Requests\ReturnToService\GetReturnToServiceV1Request;
use spkm\Jamf\Pro\Requests\ReturnToService\ReplaceReturnToServiceV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The return-to-service endpoints of the Jamf Pro API, from Jamf::returnToService().
 *
 * @extends BaseResource<Data>
 */
class ReturnToServiceResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create a Return to Service Configuration: POST /v1/return-to-service.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createReturnToServiceV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateReturnToServiceV1Request($body, $options));
    }

    /**
     * Delete a Return To Service Configuration with the supplied id: DELETE /v1/return-to-service/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteReturnToServiceV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteReturnToServiceV1Request($id, $options));
    }

    /**
     * Retrieve a Return to Service Configuration with the supplied id: GET /v1/return-to-service/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getReturnToServiceByIdV1(int|string $id, array $options = []): ?ReturnToServiceConfiguration
    {
        return $this->fetch(new GetReturnToServiceByIdV1Request($id, $options));
    }

    /**
     * Get all Return to Service Configurations: GET /v1/return-to-service.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, ReturnToServiceConfiguration>
     */
    public function getReturnToServiceV1(array $options = []): Collection
    {
        return $this->fetch(new GetReturnToServiceV1Request($options));
    }

    /**
     * Update a Return to Service Configuration: PUT /v1/return-to-service/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceReturnToServiceV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ReturnToServiceConfiguration
    {
        return $this->fetch(new ReplaceReturnToServiceV1Request($id, $body, $options));
    }
}
