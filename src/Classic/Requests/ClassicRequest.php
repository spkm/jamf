<?php

namespace spkm\Jamf\Classic\Requests;

use spkm\Jamf\Requests\JamfRequest;

/**
 * What every Classic API request shares: its answer is wrapped in the name of its kind ({"mobile_device": {...}}),
 * which dto() takes off, and records come back as arrays, since Jamf publishes no schema for them.
 */
abstract class ClassicRequest extends JamfRequest
{
    protected bool $unwrap = true;
}
