<?php

namespace spkm\Jamf\Pro\Requests\Packages;

use spkm\Jamf\Pro\Data\Package;
use spkm\Jamf\Requests\UploadRequest;
use spkm\Jamf\Support\Path;
use SplFileInfo;

/**
 * Add a manifest to a package: POST /v1/packages/{id}/manifest.
 */
class CreatePackageManifestV1Request extends UploadRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = Package::class;

    /**
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, mixed $file, ?string $filename = null, array $options = [])
    {
        $this->file = $file;
        $this->filename = $filename;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/packages/'.Path::segment((string) $this->id).'/manifest';
    }
}
