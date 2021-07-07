<?php

use Illuminate\Support\Facades\Route;

Route::get('katalog', 'DirController@index')
    ->name('dir.index');

Route::get('szukaj', 'DirController@search')
    ->name('dir.search');

Route::match(['get', 'post'], '{dir_cache}', 'DirController@show')
    ->name('dir.show')
    ->where('dir_cache', '[0-9A-Za-z,_-]+');



Route::group(['middleware' => ['icore.ban.user', 'icore.ban.ip']], function () {
    Route::get('dodaj/1', 'DirController@create1')
        ->name('dir.create_1');

    Route::get('grupa/{group}/dodaj/2', 'DirController@create2')
        ->where('group', '[0-9]+')
        ->name('dir.create_2');
    Route::post('grupa/{group}/2', 'DirController@store2')
        ->where('group', '[0-9]+')
        ->name('dir.store_2');

    Route::get('grupa/{group}/dodaj/3', 'DirController@create3')
        ->where('group', '[0-9]+')
        ->name('dir.create_3');
    Route::post('grupa/{group}/3', 'DirController@store3')
        ->where('group', '[0-9]+')
        ->name('dir.store_3');

    Route::group(['middleware' => ['auth']], function () {
        Route::delete('wpis/{dir}', 'DirController@destroy')
            ->middleware(['permission:web.dirs.delete', 'can:delete,dir'])
            ->name('dir.destroy')
            ->where('dir', '[0-9]+');

        Route::get('{dir}/edycja/1', 'DirController@edit1')
            ->middleware(['permission:web.dirs.edit', 'can:edit,dir'])
            ->name('dir.edit_1')
            ->where('dir', '[0-9]+');

        Route::get('{dir}/grupa/{group}/edycja/2', 'DirController@edit2')
            ->middleware(['permission:web.dirs.edit', 'can:edit,dir'])
            ->name('dir.edit_2')
            ->where('group', '[0-9]+')
            ->where('dir', '[0-9]+');
        Route::put('{dir}/grupa/{group}/2', 'DirController@update2')
            ->middleware(['permission:web.dirs.edit', 'can:edit,dir'])
            ->name('dir.update_2')
            ->where('group', '[0-9]+')
            ->where('dir', '[0-9]+');

        Route::get('{dir}/grupa/{group}/edycja/3', 'DirController@edit3')
            ->middleware(['permission:web.dirs.edit', 'can:edit,dir'])
            ->name('dir.edit_3')
            ->where('group', '[0-9]+')
            ->where('dir', '[0-9]+');
        Route::put('{dir}/grupa/{group}/3', 'DirController@update3')
            ->middleware(['permission:web.dirs.edit', 'can:edit,dir'])
            ->name('dir.update_3')
            ->where('group', '[0-9]+')
            ->where('dir', '[0-9]+');

        Route::get('{dir}/edycja/odnowienie', 'DirController@editRenew')
            ->middleware(['permission:web.dirs.edit', 'can:edit,dir'])
            ->name('dir.edit_renew')
            ->where('dir', '[0-9]+');
        Route::patch('{dir}/odnowienie', 'DirController@updateRenew')
            ->middleware(['permission:web.dirs.edit', 'can:edit,dir'])
            ->name('dir.update_renew')
            ->where('dir', '[0-9]+');
    });
});
