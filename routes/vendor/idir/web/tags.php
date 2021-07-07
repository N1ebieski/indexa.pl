<?php

use Illuminate\Support\Facades\Route;

Route::get('tag/{tag_cache}', 'Tag\Dir\TagController@show')
    ->name('tag.dir.show')
    ->where('tag_cache', '[0-9A-Za-z,_-]+');
