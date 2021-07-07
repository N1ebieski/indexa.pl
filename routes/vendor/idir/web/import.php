<?php

use Illuminate\Support\Facades\Route;

Route::get('import/kategorie/{category}', 'Import\CategoryController@show')
    ->name('import.category.dir.show')
    ->where('category', '[0-9]+');

Route::get('import/{dir}', 'Import\DirController@show')
    ->name('import.dir.show')
    ->where('dir', '[0-9]+');
