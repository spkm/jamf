<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\JamfProServerUrl;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfProServerUrlPreview\CreateJamfProServerUrlHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfProServerUrlPreview\GetJamfProServerUrlHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfProServerUrlPreview\GetJamfProServerUrlV1Request;
use spkm\Jamf\Pro\Requests\JamfProServerUrlPreview\ReplaceJamfProServerUrlV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The jamf-pro-server-url-preview endpoints of the Jamf Pro API, from Jamf::jamfProServerUrlPreview().
 *
 * @extends Builder<ObjectHistory>
 */
class JamfProServerUrlPreviewResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetJamfProServerUrlHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateJamfProServerUrlHistoryV1Request($body);
    }

    /**
     * Add Jamf Pro Server URL settings history notes: POST /v1/jamf-pro-server-url/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createJamfProServerUrlHistoryV1(array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateJamfProServerUrlHistoryV1Request($body, $options));
    }

    /**
     * Get Jamf Pro Server URL settings history: GET /v1/jamf-pro-server-url/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getJamfProServerUrlHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetJamfProServerUrlHistoryV1Request($query));
    }

    /**
     * Get Jamf Pro Server URL settings: GET /v1/jamf-pro-server-url.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getJamfProServerUrlV1(array $options = []): ?JamfProServerUrl
    {
        return $this->fetch(new GetJamfProServerUrlV1Request($options));
    }

    /**
     * Update Jamf Pro Server URL settings: PUT /v1/jamf-pro-server-url.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceJamfProServerUrlV1(array|JsonSerializable $body, array $options = []): ?JamfProServerUrl
    {
        return $this->fetch(new ReplaceJamfProServerUrlV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
