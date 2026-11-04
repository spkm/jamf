<?php

namespace spkm\Jamf\Requests;

use InvalidArgumentException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use SplFileInfo;

/**
 * A POST uploading a file as multipart form data under the name "file": a package, an icon, an attachment, a CSV.
 * The file is given as its contents, a stream, or an SplFileInfo for a file on disk.
 */
abstract class UploadRequest extends JamfRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    protected string $responseShape = self::RAW;

    protected bool $safe = false;

    /** @var string|resource|SplFileInfo */
    protected mixed $file = '';

    protected ?string $filename = null;

    /** @var array<string, mixed> */
    protected array $options = [];

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

        return [new MultipartValue('file', $file, $filename ?? 'file')];
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
