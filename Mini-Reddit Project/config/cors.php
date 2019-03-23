<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],      // Test http://localhost:4200 for the front end
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['Accept', 'Authorization', 'Content-Type'],  // Only used headers in Mini-Reddit
    'allowedMethods' => ['*'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
