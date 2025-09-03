<?php

// config/cors.php
return [
    'paths' => ['api/*', 'licenses', 'license_holders', 'employees', 'students', 'users', 'roles', 'journals'], // tambahkan path yang dibutuhkan
    'allowed_methods' => ['*'],
    'allowed_origins' => ['https://asm.aharightbrain.com'], // domain frontend kamu
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'supports_credentials' => true, // wajib untuk kirim cookie/session
];
