<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

//GET - listar os usuarios cadastrados
Route::get('/aluno/listar',[AlunoController::class, 'listar'])-> name('aluno.listar');

Route::get('/aluno/cadastrar', function(){
    return view('cadastro');
})->name('aluno.cadastro');

// POST - enviar os dados para cadastrar usuários
Route::post('/aluno/salvar',[AlunoController::class, 'add'])->name('aluno.salvar');

// Tela de Atualizar
Route::get('/aluno/{id}/atualizar', [AlunoController::class, 'atualizar'])->name('aluno.atualizar');

Route::put('/aluno/{id}/update',[AlunoController::class, 'update'])->name('aluno.update');
