<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;

Route::get('/', function () {
    return view('welcome');
});

// Livros

Route::get('/livro/listar',[LivroController::class, 'listar'])->name('livro.listar');

Route::get('/livro/cadastrar',[LivroController::class, 'create'])->name('livro.cadastrar');

Route::post('/livro/salvar',[LivroController::class, 'add'])->name('livro.salvar');

Route::get('/livro/{id}/atualizar', [LivroController::class, 'atualizar'])->name('livro.atualizar');

Route::put('/livro/{id}/update', [LivroController::class, 'update'])->name('livro.update');


// Editora

Route::get('/editora/cadastrar', function(){
    return view('cadastrarEditora');
})->name('editora.cadastrar');

Route::post('/editora/salvar', [EditoraController::class, 'add'])->name('editora.salvar');

Route::get('/editora/listar', [EditoraController::class, 'listarEditora'])->name('editora.listar');