<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RecordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/bands', [BandController::class, 'index']);
Route::post('/bands', [BandController::class, 'store']);
Route::get('/bands/{id}', [BandController::class, 'show']);

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);

Route::post('/generate_labels/{number}', [RecordController::class, 'create_record']);
Route::get('/record_labels', [RecordController::class, 'record_labels']);


