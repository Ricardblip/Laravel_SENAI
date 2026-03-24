<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/listar',[ProdutoController::class, 'listar'])->name('produto.listar');

Route::get('/produto/cadastrar', function(){
    return view('cadastro');

})->name('produto.cadastro');

//POST - enviar os dados para cadastrar produtos
Route::post('/produto/salvar',[ProdutoController::class, 'add'])->name('produto.salvar');


//TELA de atualizar
Route::get('produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])->name('produto.atualizar');

Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])->name('produto.update');