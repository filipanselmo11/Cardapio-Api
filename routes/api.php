<?php

use App\Http\Controllers\CardapioController;
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

Route::get('cardapios', [CardapioController::class, 'getAllCardapios']);
Route::get('cardapios/{id}', [CardapioController::class, 'getCardapio']);
Route::post('cardapios', [CardapioController::class, 'createCardapio']);
Route::delete('cardapios/{id}', [CardapioController::class, 'deleteCardapio']);

