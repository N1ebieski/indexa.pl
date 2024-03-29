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

use App\Crons\Dir\GusCron;
use App\Jobs\Dir\CheckGusJob;
use Carbon\Carbon;
use App\Models\Dir;
use App\Models\DirGus;
use App\Services\Factories\NipFactory;
use GusApi\GusApi;
use GusApi\ReportTypes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

// Route::get('/test/proba', function (GusApi $gusApi) {
//     $gusApi->login();
//     $gusReport = $gusApi->getByNip('5832908528');
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

// Route::get('/test/proba3', function () {
//     $gusCron = App::make(GusCron::class);

//     $gusCron();
// });

// Route::get('/', function () {
//     return view('welcome');
// });
