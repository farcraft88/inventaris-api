<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    | Path atau route mana saja yang CORS aktif. 
    | Biasanya untuk API dan CSRF cookie Sanctum.
    |
    */
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | HTTP method yang diizinkan. '*' = semua method.
    |
    */
    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | URL frontend yang boleh akses API. Bisa lebih dari satu.
    | Contoh React frontend localhost:3000
    |
    */
    'allowed_origins' => ['http://localhost:5173'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins Patterns
    |--------------------------------------------------------------------------
    |
    | Pattern regex untuk origin, biasanya kosong saja.
    |
    */
    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Header apa saja yang diperbolehkan. '*' = semua header.
    |
    */
    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Header yang boleh diakses oleh frontend.
    |
    */
    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | Waktu browser menyimpan cache CORS preflight request.
    |
    */
    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Wajib true kalau pakai Sanctum dengan cookie atau token.
    |
    */
    'supports_credentials' => true,

];
