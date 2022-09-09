<?php

use Illuminate\Support\Facades\Route;

// === コントローラー読み込み
use App\Http\Controllers\CalendarController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [CalendarController::class, 'top'])->name('calendar.top');

Route::get('/{num}', [CalendarController::class, 'prev'])->name('calendar.prev');
