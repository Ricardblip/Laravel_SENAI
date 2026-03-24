<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller{
    public function listar(){
        $query = Produto::query();
        $produtos = $query->get();
        return view('listar', compact('produtos'));
    }

    // ADICIONADO RECENTEMENTE

    public function add(Request $request){

    $request->validate([
        'nome' => 'required|string|max:255',
        'quantidade' => 'required|string|max:255',
        'preco' => 'required|string|max:255',
    ]);

    Produto::create([
        'nome' => $request->nome,
        'quantidade' => $request->quantidade,
        'preco' => $request->preco
    ]);

    return redirect()->back()->with('sucess','Produto Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $produto = Produto::findOrFail($id); //Busca o produto pelo ID
        // select * from produtos where id = $id
        return view('atualizar', compact('produto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255',
        ]);

        $produto = Produto::findOrFail($id); //buscar o produto pra ser atualizado

        $produto->nome = $request->nome; //atualizando o campo nome
        $produto->quantidade = $request->quantidade; //atualizando o campo qntd
        $produto->preco = $request->preco; //atualizando o campo preço

        $produto->save(); //salvando no banco de dados
        return redirect()->back()->with('seccess','Produto atualizado com sucesso');
    }
}

?>