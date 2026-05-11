<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller{

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'nCorredor' => 'required|string|max:255'
        ]);

        Setor::create([
            'nome' => $request->nome,
            'nCorredor' => $request->nCorredor
        ]);

        return redirect()->back()->with('success','Setor cadastrado com sucesso!');
    }
}