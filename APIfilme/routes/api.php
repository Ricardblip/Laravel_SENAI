<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorApiController;
use App\Http\Controllers\FilmeApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rotas autor API
Route::get('autores',[AutorApiController::class, 'listarApi']);
Route::post('autor/add',[AutorApiController::class, 'addApi']);
Route::put('autor/atualizar/{id}',[AutorApiController::class, 'updateApi']);
Route::put('autor/deletar/{id}',[AutorApiController::class, 'deletarApi']);

// Rotas filme API
Route::get('filmes',[FilmeApiController::class, 'listarApi']);
Route::post('filme/add',[FilmeApiController::class, 'addApi']);
Route::put('filme/atualizar/{id}',[FilmeApiController::class, 'updateApi']);
Route::put('filme/deletar/{id}',[FilmeApiController::class, 'deletarApi']);