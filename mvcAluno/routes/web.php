<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

// Alunos
Route::get('/aluno/listar',[AlunoController::class, 'listar'])->name('aluno.listar');

// 🔥 CORREÇÃO AQUI (usar controller e não view direta)
Route::get('/aluno/cadastrar',[AlunoController::class, 'create'])->name('aluno.cadastro');

Route::post('/aluno/salvar',[AlunoController::class, 'add'])->name('aluno.salvar');

Route::get('/aluno/{id}/atualizar', [AlunoController::class, 'atualizar'])->name('aluno.atualizar');

Route::put('/aluno/{id}/update', [AlunoController::class, 'update'])->name('aluno.update');

Route::delete('/aluno/{id}', [AlunoController::class, 'deletar'])->name('aluno.deletar');


// Turmas
Route::get('/turma/cadastrar', function(){
    return view('cadastroTurma');
})->name('turma.cadastro');

Route::post('/turma/salvar',[TurmaController::class, 'add'])->name('turma.salvar');