<?php

use Blog\Blog\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'blog',
        'middleware' => ['auth:api'],
    ],

    static function (): void {
        Route::post('posts', [BlogController::class, 'store'])->name('store.post');
    }

);
