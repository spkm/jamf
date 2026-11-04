<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\JssUser\FindjssuserRequest;

/**
 * The jssuser endpoints of the Classic API, from Jamf::classic()->jssUser().
 */
class JssUserResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindjssuserRequest;
    }

    /**
     * Returns basic information about Jamf Pro, as well as privileges of the person requesting the resource.
     * Deprecated: GET /jssuser.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findjssuser(array $options = []): Collection
    {
        return $this->fetch(new FindjssuserRequest($options));
    }
}
