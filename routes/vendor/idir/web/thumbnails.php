<?php

use Illuminate\Support\Facades\Route;

Route::get('thumbnails', 'ThumbnailController@show')
    ->name('thumbnail.show');

# Must be last

Route::match(['get', 'post'], '{dir_cache}', 'DirController@show')
    ->name('dir.show')
    ->where('dir_cache', '[0-9A-Za-z,_-]+');
