<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerExtensionAttribute record from the Jamf Pro API.
 */
readonly class ComputerExtensionAttribute extends Data
{
    /**
     * @param  list<string>|null  $values
     * @param  list<string>|null  $options
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** An identifier of extension attribute definition. */
        public ?string $definitionId = null,
        /** A human-readable name by which attribute can be referred to. */
        public ?string $name = null,
        /** An additional explanation of exact attribute meaning, possible values, etc. */
        public ?string $description = null,
        public ?bool $enabled = null,
        public ?bool $multiValue = null,
        /** A value of extension attribute, in some rare cases there may be multiple values present, hence the array. */
        public ?array $values = null,
        /** A data type of extension attribute. */
        public ?string $dataType = null,
        /** A closed list of possible values (applies to `popup` input type). */
        public ?array $options = null,
        /** The input method. `text` is most common and means simply free text, `popup` i a closed list of values from which one or many can be selected and `script` value is calculated and can never be set... */
        public ?string $inputType = null,
        public array $extra = [],
    ) {}
}
