<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistoryV1;
use spkm\Jamf\Pro\Data\SmtpAuthenticationTypeList;
use spkm\Jamf\Pro\Data\SmtpServerV2;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SmtpServer\CreateSmtpServerHistoryV1Request;
use spkm\Jamf\Pro\Requests\SmtpServer\GetSmtpServerAllowedAuthTypesV2Request;
use spkm\Jamf\Pro\Requests\SmtpServer\GetSmtpServerHistoryV1Request;
use spkm\Jamf\Pro\Requests\SmtpServer\GetSmtpServerV2Request;
use spkm\Jamf\Pro\Requests\SmtpServer\ReplaceSmtpServerV2Request;
use spkm\Jamf\Pro\Requests\SmtpServer\TestSmtpServerV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The smtp-server endpoints of the Jamf Pro API, from Jamf::smtpServer().
 *
 * @extends Builder<ObjectHistoryV1>
 */
class SmtpServerResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistoryV1::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSmtpServerHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateSmtpServerHistoryV1Request($body);
    }

    /**
     * Add SMTP Server history object notes: POST /v1/smtp-server/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSmtpServerHistoryV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateSmtpServerHistoryV1Request($body, $options));
    }

    /**
     * Get allowed SMTP authentication types: GET /v2/smtp-server/allowed-auth-types.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSmtpServerAllowedAuthTypesV2(array $options = []): ?SmtpAuthenticationTypeList
    {
        return $this->fetch(new GetSmtpServerAllowedAuthTypesV2Request($options));
    }

    /**
     * Get specified SMTP Server history object: GET /v1/smtp-server/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistoryV1>
     */
    public function getSmtpServerHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistoryV1::class, fn (Query $query) => new GetSmtpServerHistoryV1Request($query));
    }

    /**
     * Finds the Jamf Pro SMTP Server information: GET /v2/smtp-server.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSmtpServerV2(array $options = []): ?SmtpServerV2
    {
        return $this->fetch(new GetSmtpServerV2Request($options));
    }

    /**
     * Updates Jamf Pro SMTP Server information: PUT /v2/smtp-server.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: oauth-state.
     */
    public function replaceSmtpServerV2(array|JsonSerializable $body, array $options = []): ?SmtpServerV2
    {
        return $this->fetch(new ReplaceSmtpServerV2Request($body, $options));
    }

    /**
     * Test functionality of an SMTP Server: POST /v1/smtp-server/test.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function testSmtpServerV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new TestSmtpServerV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
