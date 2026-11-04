<?php

namespace spkm\Jamf\Classic\Requests\JssUser;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Returns basic information about Jamf Pro, as well as privileges of the person requesting the resource. Deprecated: GET /jssuser.
 */
class FindjssuserRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/jssuser';
    }
}
