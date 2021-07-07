<?php

use Illuminate\Support\Facades\Route;

Route::get('kontakt', 'ContactController@show')
    ->name('contact.show');
Route::post('kontakt', 'ContactController@send');
