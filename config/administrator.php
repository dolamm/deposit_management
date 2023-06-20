<?php 
    /*
    |--------------------------------------------------------------------------
    | Default admin user
    |--------------------------------------------------------------------------
    |
    | Default user will be created at project installation/deployment
    |
    */
use Illuminate\Support\Str;
return [
    'fullname' =>'administrator',
    'email' => 'admin@superbank.com',
    'password' => '12345678',
    'role' => 1,
    'cmnd_cccd' => "123465789",
    'phone' => '0916036287',
    'address' => 'bank master',
    'birthday' => '1999-01-01 00:00:00',
    'api_token' => Str::random(60),
    'avatar' => 'https://static.zerochan.net/Kafuu.Chino.full.1946772.jpg'
];