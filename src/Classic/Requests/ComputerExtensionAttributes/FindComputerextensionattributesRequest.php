<?php

namespace spkm\Jamf\Classic\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all computer extension attributes: GET /computerextensionattributes.
 */
class FindComputerextensionattributesRequest extends ClassicGetRequest
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
        return '/computerextensionattributes';
    }
}
