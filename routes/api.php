<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/plants', [PlantsController::class, "index"]); // Read data
Route::put('/v1/plants/{id}', [PlantsController::class, "update"])->name('update_plant'); // Update data
Route::delete('/v1/plants/{id}', [PlantsController::class, "delete"])->name('delete_plant'); // Remove data
Route::post('/v1/plants/create',[PlantsController::class,'create'])->name('create_plant'); // Create data


