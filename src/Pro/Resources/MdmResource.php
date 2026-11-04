<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\BlankPushResponse;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\MdmCommand;
use spkm\Jamf\Pro\Data\RenewMdmProfileResponse;
use spkm\Jamf\Pro\Data\VerbosePackageDeploymentResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Mdm\CreateMdmBlankPushV2Request;
use spkm\Jamf\Pro\Requests\Mdm\CreateMdmCommandsV2Request;
use spkm\Jamf\Pro\Requests\Mdm\DeployPackageV1Request;
use spkm\Jamf\Pro\Requests\Mdm\GetMdmCommandsV1Request;
use spkm\Jamf\Pro\Requests\Mdm\GetMdmCommandsV2Request;
use spkm\Jamf\Pro\Requests\Mdm\RenewMdmProfileV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The mdm endpoints of the Jamf Pro API, from Jamf::mdm().
 *
 * @extends Builder<MdmCommand>
 */
class MdmResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, MdmCommand::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMdmCommandsV2Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateMdmCommandsV2Request($body);
    }

    /**
     * Send blank push notifications to a list of client management IDs: POST /v2/mdm/blank-push.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createMdmBlankPushV2(array|JsonSerializable $body, array $options = []): ?BlankPushResponse
    {
        return $this->fetch(new CreateMdmBlankPushV2Request($body, $options));
    }

    /**
     * Post a command for creation and queuing: POST /v2/mdm/commands.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, HrefResponse>
     */
    public function createMdmCommandsV2(array|JsonSerializable $body = [], array $options = []): Collection
    {
        return $this->fetch(new CreateMdmCommandsV2Request($body, $options));
    }

    /**
     * Deploy packages using MDM: POST /v1/deploy-package.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: verbose.
     */
    public function deployPackageV1(array|JsonSerializable $body, array $options = []): ?VerbosePackageDeploymentResponse
    {
        return $this->fetch(new DeployPackageV1Request($body, $options));
    }

    /**
     * Get information about mdm commands made by Jamf Pro: GET /v1/mdm/commands.
     *
     * @deprecated Jamf deprecated this endpoint on 2023-10-16.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: uuids, client-management-id.
     * @return Collection<int, MdmCommand>
     */
    public function getMdmCommandsV1(array $options = []): Collection
    {
        return $this->fetch(new GetMdmCommandsV1Request($options));
    }

    /**
     * Get information about mdm commands made by Jamf Pro: GET /v2/mdm/commands.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<MdmCommand>
     */
    public function getMdmCommandsV2(): PagedResource
    {
        return new PagedResource($this->pro(), MdmCommand::class, fn (Query $query) => new GetMdmCommandsV2Request($query));
    }

    /**
     * Renew MDM Profile: POST /v1/mdm/renew-profile.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function renewMdmProfileV1(array|JsonSerializable $body, array $options = []): ?RenewMdmProfileResponse
    {
        return $this->fetch(new RenewMdmProfileV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
