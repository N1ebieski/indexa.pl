<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('raport/{dir}/dodaj', 'Report\Dir\ReportController@create')
        ->name('report.dir.create')
        ->where('dir', '[0-9]+');
    Route::post('raport/{dir}', 'Report\Dir\ReportController@store')
        ->name('report.dir.store')
        ->where('dir', '[0-9]+');
});
