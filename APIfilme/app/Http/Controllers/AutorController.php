<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listar(){
        $query = Autor::query();
        $Autores = $query->get();
        return view('listar', compact('Autores'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|date',
            'email' => 'required|email|unique:autores,email',
            'telefone' => 'required|string|max:20',
        ]);
        
        Autor::create([
            'nome' => $request->nome,
            'dataNascimento' => $request->dataNascimento,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        return redirect()->back()->with('success', 'Autor Cadastrado com sucesso!');
    }
}