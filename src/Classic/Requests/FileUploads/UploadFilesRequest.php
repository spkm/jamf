<?php

namespace spkm\Jamf\Classic\Requests\FileUploads;

use InvalidArgumentException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Support\Path;
use SplFileInfo;

/**
 * Uploads file attachments to an existing resource and id: POST /fileuploads/{resource}/{idType}/{id}.
 *
 * Attaches a file (an icon, a PDF, an attachment) to a record, sent as multipart form data under the name "name",
 * as the Classic API takes it. $resource is the kind of record (computers, mobiledevices, enrollmentprofiles,
 * printers, peripherals, policies, ebooks, mobiledeviceapplicationsicon, mobiledeviceapplicationsipa, diskencryptionconfigurations,
 * ...) and $idType says what $id is (id, or name for some).
 */
class UploadFilesRequest extends ClassicRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    protected string $responseShape = self::NONE;

    protected bool $safe = false;

    /**
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     */
    public function __construct(protected string $resource, protected string $idType, protected int|string $id, protected mixed $file, protected ?string $filename = null) {}

    public function resolveEndpoint(): string
    {
        return '/fileuploads/'.Path::segment($this->resource).'/'.Path::segment($this->idType).'/'.Path::segment((string) $this->id);
    }

    /**
     * @return array<MultipartValue>
     */
    protected function defaultBody(): array
    {
        $file = $this->file;
        $filename = $this->filename;

        if ($file instanceof SplFileInfo) {
            $filename ??= $file->getFilename();
            $file = @fopen($file->getPathname(), 'r') ?: throw new InvalidArgumentException('"'.$file->getPathname().'" cannot be read.');
        }

        return [new MultipartValue('name', $file, $filename ?? 'file')];
    }
}
