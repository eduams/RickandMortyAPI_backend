<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorDados;
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
//Esse não é um método seguro de autenticação
Route::post('/autentication', [ControladorDados::class, 'autenticarUser']);
Route::post('/signup', [ControladorDados::class, 'cadastrarUser']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/dados', [ControladorDados::class, 'index']);
Route::post('/salvar-dados', [ControladorDados::class, 'salvarDados']);
Route::post('/remover-dados', [ControladorDados::class, 'removerDados']);
Route::post('/editar-dados', [ControladorDados::class, 'editaDados']);