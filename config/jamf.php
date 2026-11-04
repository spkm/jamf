<?php

return [
    // Your Jamf Pro server's address, such as https://yourschool.jamfcloud.com. The package adds /api for the Jamf
    // Pro API and /JSSResource for the Classic API.
    'base_url' => env('JAMF_BASE_URL'),

    // An API client (Settings > System > API roles and clients), which Jamf recommends. Its token works on both
    // APIs, with the privileges of the roles the client has.
    'client_id' => env('JAMF_CLIENT_ID'),
    'client_secret' => env('JAMF_CLIENT_SECRET'),

    // Or a Jamf Pro user account, used when no API client is set. Its token works on both APIs too.
    'username' => env('JAMF_USERNAME'),
    'password' => env('JAMF_PASSWORD'),

    // Other Jamf Pro servers, used with Jamf::connection('name') and Jamf::classic('name'):
    // 'connections' => [
    //     'other' => ['base_url' => ..., 'client_id' => ..., 'client_secret' => ...],
    //     'legacy' => ['base_url' => ..., 'username' => ..., 'password' => ...],
    // ],
    'connections' => [],

    'timeouts' => [
        'connect' => env('JAMF_CONNECT_TIMEOUT', 10),
        'request' => env('JAMF_REQUEST_TIMEOUT', 30),
    ],

    'retries' => [
        'times' => env('JAMF_RETRIES'),
        'interval_ms' => 500,
    ],

    // Fetch a new token and send the request again, once, when Jamf answers 401 to it.
    'reauthenticate' => true,

    'cache' => [
        // Cache the answers to GET requests for records, per server and credentials.
        'enabled' => env('JAMF_CACHE', false),
        'store' => env('JAMF_CACHE_STORE'),
        'seconds' => 3600,
    ],

    'pagination' => [
        // Records per page when paging through a list with all(), lazy() or paginate(). Jamf allows up to 2000.
        'per_page' => 100,
    ],
];
