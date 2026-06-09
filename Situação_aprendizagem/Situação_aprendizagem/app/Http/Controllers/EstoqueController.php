<?php
// estou no ProdutiController.php
namespace App\Http\Controllers;
use App\Models\Producao;
use App\Models\Estoque;

use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function listar(Request $request){
        $estoque = Estoque::all();
        return view('listarEstoque', compact('estoque'));
    }

    public function add(Request $request){

        $request->validate([
            'produto' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
            // para poder ser nulo ou existir na tabela setores
        ]);

        Estoque::create([
            'produto' => $request->produto,
            'num_setor' => $request->num_setor
        ]);

        return redirect()->back()->with('success','Estoque Cadastrado com sucesso!');

    }

}