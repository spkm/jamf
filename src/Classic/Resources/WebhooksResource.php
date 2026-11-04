<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Webhooks\CreateWebhookByIdRequest;
use spkm\Jamf\Classic\Requests\Webhooks\DeleteWebhookByIdRequest;
use spkm\Jamf\Classic\Requests\Webhooks\FindWebhooksByIdRequest;
use spkm\Jamf\Classic\Requests\Webhooks\FindWebhooksByNameRequest;
use spkm\Jamf\Classic\Requests\Webhooks\FindWebhooksRequest;
use spkm\Jamf\Classic\Requests\Webhooks\UpdateWebhookByIdRequest;

/**
 * The webhooks endpoints of the Classic API, from Jamf::classic()->webhooks().
 */
class WebhooksResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindWebhooksRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindWebhooksByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateWebhookByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateWebhookByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteWebhookByIdRequest($id);
    }

    /**
     * Creates a new webhook by id: POST /webhooks/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <webhook>), or the XML itself.
     */
    public function createWebhookById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateWebhookByIdRequest($id, $record));
    }

    /**
     * Deletes a webhook by id: DELETE /webhooks/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteWebhookById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteWebhookByIdRequest($id, $options));
    }

    /**
     * Finds all webhooks: GET /webhooks.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findWebhooks(array $options = []): Collection
    {
        return $this->fetch(new FindWebhooksRequest($options));
    }

    /**
     * Finds webhooks by id: GET /webhooks/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findWebhooksById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindWebhooksByIdRequest($id, $options));
    }

    /**
     * Finds webhooks by name: GET /webhooks/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findWebhooksByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindWebhooksByNameRequest($name, $options));
    }

    /**
     * Updates an existing webhook by id: PUT /webhooks/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <webhook>), or the XML itself.
     */
    public function updateWebhookById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateWebhookByIdRequest($id, $record));
    }
}
