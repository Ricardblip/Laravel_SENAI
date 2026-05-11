<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setor;
use Illuminate\Http\Request;

class ProdutoController extends Controller{

    public function listar(){
        $produtos = Produto::with('setor')->get();
        return view('listar', compact('produtos'));
    }

    public function create(){
        $setores = Setor::all();
        return view('cadastro', compact('setores'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255',
            'setor_id' => 'required|exists:setores,id' // ✅ corrigido
        ]);

        Produto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'setor_id' => $request->setor_id // ✅ corrigido
        ]);

        return redirect()->back()->with('success','Produto cadastrado com sucesso!');
    }

    public function atualizar($id){
        $produto = Produto::findOrFail($id);
        $setores = Setor::all(); // opcional (pra select)
        return view('atualizar', compact('produto','setores'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco; // ✅ faltava isso

        $produto->save();

        return redirect()->back()->with('success','Produto atualizado com sucesso!');
    }

    public function deletar($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produto.listar')->with('success','Produto excluído com sucesso!');
    }
}