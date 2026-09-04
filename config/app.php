<?php

use Illuminate\Support\Facades\Env;

return [
    'name' => Env::get('APP_NAME', 'Laravel'),
    'env' => Env::get('APP_ENV', 'production'),
    'debug' => (bool) Env::get('APP_DEBUG', false),
    'url' => Env::get('APP_URL', 'http://localhost'),
    'timezone' => 'Asia/Kolkata',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => Env::get('APP_KEY'),
    'previous_keys' => array_filter(explode(',', Env::get('APP_PREVIOUS_KEYS', ''))),
    'maintenance' => ['driver' => 'file'],
];
