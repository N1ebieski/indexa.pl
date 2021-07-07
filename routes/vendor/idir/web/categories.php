<?php

Route::get('kategoria/szukaj', 'Category\Dir\CategoryController@search')
    ->name('category.dir.search');

Route::get('kategoria/{category_dir_cache}/{region_cache?}', 'Category\Dir\CategoryController@show')
    ->name('category.dir.show')
    ->where('category_dir_cache', '[0-9A-Za-z,_-]+')
    ->where('region_cache', '[a-z-]+');
