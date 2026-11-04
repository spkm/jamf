<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CloudDistributionPointTestConnection record from the Jamf Pro API.
 */
readonly class CloudDistributionPointTestConnection extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Indicates whether the connection to the cloud distribution point was successful. If `true`, the connection was successful. If `false`, the connection failed. Possible values are: false true */
        public ?bool $hasConnectionSucceeded = null,
        /** A message detailing the result of the connection test. This could be a success message or an error message if the connection failed. */
        public ?string $message = null,
        public array $extra = [],
    ) {}
}
