<?php

return [


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],



    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'teacher' => [
            'driver' => 'session',
            'provider' => 'teachers',
        ],
        'student' => [
            'driver' => 'session',
            'provider' => 'students',
        ],
        'parent' => [
            'driver' => 'session',
            'provider' => 'myparents',
        ],
    ],


    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'teachers' => [
            'driver' => 'eloquent',
            'model' => App\Models\teachers::class,
        ],
        'students' => [
            'driver' => 'eloquent',
            'model' => App\Models\students::class,
        ],
        'myparents' => [
            'driver' => 'eloquent',
            'model' => App\Models\MyParent::class,
        ],


    ],



    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],



    'password_timeout' => 10800,

];
