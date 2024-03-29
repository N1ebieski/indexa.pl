<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('ranking/{dir}/rate', 'Rating\Dir\RatingController@rate')
        ->name('rating.dir.rate')
        ->where('dir', '[0-9]+');
});
