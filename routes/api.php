<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'blog',
        'middleware' => ['api'],
    ],

    static function (): void {
        Route::get('welcome', function () {
            return "hello";
        });
    }

);
