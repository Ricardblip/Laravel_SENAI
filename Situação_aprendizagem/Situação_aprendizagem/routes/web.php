<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
//ROTAS DE USUARIO

Route::get('/login', function(){
    return view('login');
})->name('login');

// rota para fazer login
Route::post('/autenticar',[UserController::class, 'autenticar'])->name('login.autenticar');

Route::get('/usuario/cadastrar', function(){
    return view('cadastroUsuario');
});
Route::get('/usuario/cadastrar', function(){
    return view('welcome');
});
Route::post('/usuario/salvar',[UserController::class, 'add'])->name('usuario.salvar');

// ROTA DE TROCAR A SENHA
Route::get('/senha', function(){
    return view('trocarSenha');
})->name('senha.tela');

Route::post('/senha/trocar',[UserController::class, 'trocarSenha'])->name('senha.trocar');

// ROTA PARA SAIR
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// produtos
Route::get('/produto/listar',[ProdutoController::class, 'listar'])->name('produto.listar');


    Route::middleware('auth')->group(function(){

    });


Route::get('/produto/cadastrar',[ProdutoController::class, 'create'])->name('produto.cadastro');

Route::post('/produto/salvar',[ProdutoController::class, 'add'])->name('produto.salvar');

Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])->name('produto.atualizar');

Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])->name('produto.update');

Route::delete('/produto/{id}', [ProdutoController::class, 'deletar'])->name('produto.deletar');


// estoque
Route::get('/estoque/listar',[EstoqueController::class, 'Listar'])->name('estoque.Listar');
Route::get('/setor/cadastrar', function(){
    return view('cadastroSetor');
})->name('setor.cadastro');

Route::post('/setor/salvar',[SetorController::class, 'add'])->name('setor.salvar');

Route::get('/setor/listar',[SetorController::class, 'listarSetor'])->name('setor.listar');