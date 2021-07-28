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

use App\Jobs\Dir\CheckGusJob;
use App\Models\Dir;
use App\Models\DirGus;
use App\Services\Factories\NipFactory;
use GusApi\GusApi;
use GusApi\ReportTypes;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

// Route::get('/test/proba', function (GusApi $gusApi) {
//     $gusApi->login();
//     $gusReport = $gusApi->getByNip('8321004359');
//     $fullReport = $gusApi->getFullReport($gusReport[0], ReportTypes::REPORT_ORGANIZATION);

//     dump($gusReport[0]);
//     dump($fullReport[0]);
// });

// Route::get('/test/proba2', function () {
//     dd(DB::table('fields_values')
//     ->whereJsonContains('value', '120593814')
//     ->where('field_id', '=', Config::get('idir.field.gus.nip'))
//     ->where('model_type', '=', Dir::make()->getMorphClass())
//     ->first());
// });

// Route::get('/test/proba3', function (CheckGusJob $checkGusJob) {
//     $checkGusJob->dispatch(DirGus::find(4));
// });

// Route::get('/', function () {
//     return view('welcome');
// });
