<?php

use App\Http\Controllers\CheckinController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth'])->name('home');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('type', TypeController::class)->shallow()->middleware(['auth']);
Route::get('/checkin/export', [CheckinController::class, 'export'])->name('checkin.export');
Route::resource('checkin', CheckinController::class)->shallow()->middleware(['auth']);

require __DIR__ . '/auth.php';
