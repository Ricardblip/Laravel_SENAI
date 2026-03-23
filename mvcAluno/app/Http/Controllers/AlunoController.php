<?php

namespace App\Http\Controllers;
use App\Models\Aluno;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get(); // select * from alunos
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome'=> 'required|string|max:255',
            'email'=> 'required|string|max:255|unique:alunos,email'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email
        ]);

        return redirect()->back()->with('sucess','Aluno Cadastrado com sucesso!');
    }
}

?>