<?php

use Blog\Blog\Http\Contollers\BlogController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'blogs',
        'middleware' => ['api'],
    ],

    static function (): void {
        Route::post('post', [BlogController::class, 'store'])->name('create.post');
    }

);
