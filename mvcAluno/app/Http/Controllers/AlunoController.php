<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller{

    public function listar(){
        $alunos = Aluno::with('turma')->get();
        return view('listar', compact('alunos'));
    }

    // 🔥 MÉTODO PRA ENVIAR AS TURMAS
    public function create(){
        $turmas = Turma::all();
        return view('cadastro', compact('turmas'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'turma_id' => 'required|exists:turmas,id'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'turma_id' => $request->turma_id
        ]);

        return redirect()->back()->with('success','Aluno cadastrado com sucesso!');
    }

    public function atualizar($id){
        $aluno = Aluno::findOrFail($id);
        return view('atualizar', compact('aluno'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:alunos,email,$id"
        ]);

        $aluno = Aluno::findOrFail($id);

        $aluno->nome = $request->nome;
        $aluno->email = $request->email;

        $aluno->save();

        return redirect()->back()->with('success','Aluno atualizado com sucesso!');
    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('aluno.listar')->with('success','Aluno excluído com sucesso!');
    }
}