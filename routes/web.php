<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\TermController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\UploadController;

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

Route::get('/', function () {
    $year = Carbon::now()->year;
    $nextYear = $year + 1;
    return view('pages.landing', ["year" => "$year/$nextYear"]);
});

Route::get('/sample', function () {
    return view('pages.sample');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/ruben', function(){
	return view('pages.ruben');
});

Route::resource('api/terms', TermController::class);
Route::resource('api/careers', CareerController::class);
Route::resource('api/logs', LogController::class);
Route::resource('api/students', StudentController::class);
Route::resource('api/import', ImportController::class);
Route::resource('api/upload', UploadController@store);
require __DIR__ . '/auth.php';

Route::name('admin') /*admin/dashboard*/
    ->prefix('admin')
    ->middleware(['auth', 'can:accessAdmin'])
    ->group(function () {
        require __DIR__ . '/admin.php';
    });
