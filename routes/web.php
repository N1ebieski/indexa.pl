<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/test/proba', function () {
    dd(
        DB::table('fields_values')
            ->whereJsonContains('value', '1060003623')
            ->first()
    );
});

// Route::get('/', function () {
//     return view('welcome');
// });
