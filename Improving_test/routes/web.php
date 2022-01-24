<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, "index"])->name("index");
Route::post('/data',[MainController::class, "locationhandler"])->name("location");

Route::post('/data/dataHandler',[MainController::class, 'dataHandler']);
Route::get('/data/{data}',[MainController::class, 'show'])->name("data.show");
