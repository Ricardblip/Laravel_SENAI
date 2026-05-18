<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class FilmeApiController extends Controller
{
    public function listarApi(){
        $filmes = Filme::all();
        return response()->json($filmes, 200);
    }

    public function addApi(Request $request){
        $request->validate([
        'titulo' => 'required|string|max:255',
        'dataLancamento' => 'required|date',
        'sinopse' => 'required|string',
        'genero' => 'required|string|max:255',
        'orcamento' => 'required|numeric',
    ]);
        
    $filme = Filme::create([
        'titulo' => $request->titulo,
        'dataLancamento' => $request->dataLancamento,
        'sinopse' => $request->sinopse,
        'genero' => $request->genero,
        'orcamento' => $request->orcamento,
    ]);

        return response()->json([
            'message' => 'Filme Criado',
            'filme' => $filme
        ], 200);
    }

    public function updateApi(Request $request, $id){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'dataLancamento' => 'required|date',
            'sinopse' => 'required|string',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
        ]);

        $filme = Filme::findOrFail($id); // Busca o filme para ser atualizado

        $filme->titulo = $request->titulo; // Atualizando o campo titulo
        $filme->dataLancamento = $request->dataLancamento;
        $filme->sinopse = $request->sinopse;
        $filme->genero = $request->genero;
        $filme->orcamento = $request->orcamento;

        $filme->save(); // Salvando no banco de dados(fazendo update)

        return response()->json([
            'message' => "Filme Atualizado!",
            'filme' => $filme
        ], 200);
    }

    public function deletarApi($id){
        $filme = Filme::findOrFail($id); // Buscar o filme pelo ID
        $filme->delete(); // Deletar o filme do banco de dados

        return response()->json([
            'message' => "Filme Deletado com Sucesso!",
            'filme' => $filme
        ], 200);
    }
}