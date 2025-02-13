<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\PersonagemController;

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

Route::get('/counter', [CounterController::class, 'index']); // Obter o valor do contador
Route::post('/counter/increment', [CounterController::class, 'increment']); 
Route::post('/counter/decrement', [counterController::class, 'decrement']);
Route::post('/counter/decrementbig', [counterController::class, 'decrementbig']);

Route::post('/personagem',[PersonagemController::class,'store']);