<?php

use App\Http\Controllers\SewaKomikController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('tambah-data', [SewaKomikController::class, 'tambah_data']);
Route::get('show-data', [SewaKomikController::class, 'show_data']);
Route::post('edit-data', [SewaKomikController::class, 'edit_data']);
Route::post('delete-data', [SewaKomikController::class, 'delete_data']);
