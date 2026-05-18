<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listar(){
        $query = Filme::query();
        $Filmes = $query->get();
        return view('listar', compact('Filmes'));
    }

    public function add(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'dataLancamento' => 'required|date',
            'sinopse' => 'required|string',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
        ]);
        
        Filme::create([
            'titulo' => $request->titulo,
            'dataLancamento' => $request->dataLancamento,
            'sinopse' => $request->sinopse,
            'genero' => $request->genero,
            'orcamento' => $request->orcamento,
            'autor_id' => $request->autor_id
        ]);

        return redirect()->back()->with('success', 'Filme Cadastrado com sucesso!');
    }

    public function cadastro(){
        $autores = Autor::get();
        return view('cadastroFilme', compact('autores'));
    }

    public function atualizar($id){
        $filme = Filme::findOrFail($id);  // Buscar o filme pelo ID
        return view('atualizar', compact('filme')); // Passar o filme para a view de atualização
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'dataLancamento' => 'required|date',
            'sinopse' => 'required|string',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
        ]);

        $filme = Filme::findOrFail($id); // Busca o filme para ser atualizado

        $filme->titulo = $request->titulo; // Atualizando o campo titulo
        $filme->dataLancamento = $request->dataLancamento; // Atualizando o campo dataLancamento
        $filme->sinopse = $request->sinopse; // Atualizando o campo sinopse
        $filme->genero = $request->genero; // Atualizando o campo genero
        $filme->orcamento = $request->orcamento; // Atualizando o campo orcamento

        $filme->save(); // Salvando no banco de dados(fazendo update)
        return redirect()->back()->with('success', 'Filme atualizado com sucesso');
    }
    
    public function deletar($id){
        $filme = Filme::findOrFail($id); // Buscar o filme pelo ID
        $filme->delete(); // Deletar o filme do banco de dados
        return redirect()->route('filme.listar')->with('success', 'Filme deletado com sucesso!');
    }
}