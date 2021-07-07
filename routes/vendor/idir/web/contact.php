<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('kontakt/{dir}', 'Contact\Dir\ContactController@show')
        ->name('contact.dir.show')
        ->where('dir', '[0-9]+');
    Route::post('kontakt/{dir}', 'Contact\Dir\ContactController@send')
        ->name('contact.dir.send')
        ->where('dir', '[0-9]+');
});
