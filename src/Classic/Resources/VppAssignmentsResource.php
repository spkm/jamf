<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\CreateAssignmentByIdRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\DeleteAssignmentByIdRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\FindAssignmentByIdRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\FindVPPAdminAssignmentRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\UpdateAssignmentByIdRequest;

/**
 * The vppassignments endpoints of the Classic API, from Jamf::classic()->vppAssignments().
 */
class VppAssignmentsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindVPPAdminAssignmentRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindAssignmentByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateAssignmentByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateAssignmentByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteAssignmentByIdRequest($id);
    }

    /**
     * Creates a new vpp assignment by id: POST /vppassignments/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <vpp_assignment>), or the XML itself.
     */
    public function createAssignmentById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateAssignmentByIdRequest($id, $record));
    }

    /**
     * Deletes a vpp assignment by id: DELETE /vppassignments/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAssignmentById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAssignmentByIdRequest($id, $options));
    }

    /**
     * Finds VPP Assignment by id: GET /vppassignments/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findAssignmentById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindAssignmentByIdRequest($id, $options));
    }

    /**
     * Finds all VPP Assignments: GET /vppassignments.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findVPPAdminAssignment(array $options = []): Collection
    {
        return $this->fetch(new FindVPPAdminAssignmentRequest($options));
    }

    /**
     * Updates a vpp assignment by id: PUT /vppassignments/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <vpp_assignment>), or the XML itself.
     */
    public function updateAssignmentById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateAssignmentByIdRequest($id, $record));
    }
}
