<?php

return [
    'default' => env('CACHE_STORE', 'database'),
    'stores' => [
        'database' => ['driver' => 'database', 'connection' => env('DB_CONNECTION'), 'table' => env('CACHE_TABLE', 'cache'), 'lock_connection' => env('DB_CONNECTION'), 'lock_table' => env('CACHE_LOCK_TABLE', 'cache_locks')],
        'file' => ['driver' => 'file', 'path' => storage_path('framework/cache/data')],
        'array' => ['driver' => 'array', 'serialize' => false],
    ],
    'prefix' => env('CACHE_PREFIX', 'surat-grocery-cache'),
];
