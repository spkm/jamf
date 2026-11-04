<?php

namespace spkm\Jamf\Pro\Requests\SmtpServer;

use spkm\Jamf\Pro\Data\ObjectHistoryV1;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get specified SMTP Server history object: GET /v1/smtp-server/history.
 */
class GetSmtpServerHistoryV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ObjectHistoryV1::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/smtp-server/history';
    }
}
