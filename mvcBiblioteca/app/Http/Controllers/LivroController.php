<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Editora;
use App\Models\Detalhe;
use Illuminate\Http\Request;

class LivroController extends Controller{

    public function listar(){
        $livros = Livro::with(['editora','detalhe'])->get();
        return view('listarLivros', compact('livros'));
    }

    public function create(){
        $editoras = Editora::all();
        return view('cadastrarLivros', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'nomeLivro' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'custo' => 'required|string|max:255',
            'preco_venda' => 'required|string|max:255',
            'imposto' => 'required|string|max:255',
            'editora_id' => 'required|exists:editora,id'
        ]);

        $detalhe = Detalhe::create([
            'custo' => $request->custo,
            'preco_venda' => $request->preco_venda,
            'imposto' => $request->imposto,
        ]);

        Livro::create([
            'nomeLivro' => $request->nomeLivro,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'custo' => $request->custo,
            'preco_venda' => $request->preco_venda,
            'imposto' => $request->imposto,
            'editora_id' => $request->editora_id,
            'detalhe_id' => $detalhe->id
        ]);

        return redirect()->back()->with('success','Livro cadastrado com sucesso!');
    }

    public function atualizar($id){
        $livro = Livro::with('detalhe')->findOrFail($id);
        $editoras = Editora::all();
        return view('atualizar', compact('livro','editoras'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nomeLivro' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'custo' => 'required|string|max:255',
            'preco_venda' => 'required|string|max:255',
            'imposto' => 'required|string|max:255'
        ]);

        $livro = Livro::findOrFail($id);

        $livro->update([
            'nomeLivro' => $request->nomeLivro,
            'autor' => $request->autor,
            'descricao' => $request->descricao
        ]);

        $livro->detalhe->update([
            'custo' => $request->custo,
            'preco_venda' => $request->preco_venda,
            'imposto' => $request->imposto
        ]);

        return redirect()->back()->with('success','Livro atualizado com sucesso!');
    }

}