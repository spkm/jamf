<?php

namespace spkm\Jamf\Exceptions;

use spkm\Jamf\JamfApiException;

/**
 * Jamf refused the call because too many are being made (429). Jamf Cloud limits the rate of calls per server and
 * says how long to wait in Retry-After.
 */
class RateLimitedException extends JamfApiException
{
    /**
     * How many seconds to wait before calling again, from Retry-After; null when Jamf didn't say.
     */
    public function retryAfter(): ?int
    {
        $retryAfter = $this->getResponse()->header('Retry-After');

        return is_string($retryAfter) && ctype_digit(trim($retryAfter)) ? (int) trim($retryAfter) : null;
    }
}
