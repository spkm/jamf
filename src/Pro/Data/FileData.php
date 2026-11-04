<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Metadata pertaining to the file.
 */
readonly class FileData extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The name of the file */
        public ?string $fileName = null,
        /** The length in bytes */
        public ?int $length = null,
        /** The MD5 in hex */
        public ?string $md5 = null,
        /** The region the file is hosted in */
        public ?string $region = null,
        /** The SHA3_512 in hex */
        public ?string $sha3 = null,
        public array $extra = [],
    ) {}
}
