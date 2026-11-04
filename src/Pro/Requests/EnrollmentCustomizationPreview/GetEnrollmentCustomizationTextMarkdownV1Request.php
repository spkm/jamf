<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use spkm\Jamf\Pro\Data\Markdown;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get the markdown output of a single Text Panel for a single Enrollment: GET /v1/enrollment-customization/{id}/text/{panel-id}/markdown.
 *
 * Get the markdown output of a single Text panel for a single enrollment customization
 */
class GetEnrollmentCustomizationTextMarkdownV1Request extends GetRequest
{
    protected ?string $dto = Markdown::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $panelId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/enrollment-customization/'.Path::segment((string) $this->id).'/text/'.Path::segment((string) $this->panelId).'/markdown';
    }
}
