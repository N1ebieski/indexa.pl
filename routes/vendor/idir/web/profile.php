<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::match(['get', 'post'], 'profil/edycja', 'ProfileController@editDir')
        ->name('profile.edit_dir');
});
