<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A SmtpGoogleMailCredentials record from the Jamf Pro API.
 */
readonly class SmtpGoogleMailCredentials extends Data
{
    protected const LISTS = ['authentications' => SmtpGoogleMailAuthentication::class];

    protected const HIDDEN = ['clientSecret'];

    /**
     * @param  Collection<int, SmtpGoogleMailAuthentication>|null  $authentications
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $clientId = null,
        public ?string $clientSecret = null,
        public ?Collection $authentications = null,
        public array $extra = [],
    ) {}
}
