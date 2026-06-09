<?php
// estou no UserController.php
namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;
use Iliuminate\Support\Facadas\Hash;
use Illuminate\Support\Facadas\Auth;

class UserController extends Controller

{
    public function listar(Request $request){
        $estoque = Estoque::all();
        return view('listarSetores', compact('estoque'));
    }

    // produtoController
    public function cadastro(){
        if(auth()->user()->tipo != 'usuario'){
            abort(403);
        }

        $estoque = Estoque::get();{
        return view('cadastroSetores', compact('estoque'));
   }

    public function add(Request $request){

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'passaword' => 'required|min:6',
            'tipo' => 'required'
        
        ]);

        User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'passaword' => Hash::make$request->password,
            'tipo' => $request->tipo
        ]);

        return redirect()->back()->with('success','cliente Cadastrado com sucesso!');

    }

    // ESTOU NA USER CONTROLLER

    public function autenticar(Request $request){
        $creadenciais = $request->validate([
            'email' => 'required|email',
            "password" => 'required'
        ]);

        if(Auth::attemp($creadenciais)){
            $request->session()->regenerate();
            // ao fazer o login envia para a tela produto listar
            return redirect()->route('produto.listar');
        }

        return back()->withErrors(['email' => 'E-mail ou senha do cliente inválidos. ']);
    }

    public function trocarSenha(Request $request){
        $request->validator([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // busca o usuario que será trocado a senha
        $usuario = User::where('email', $request->email)->first();

        if(!$usuario){
            return back()->withErros([
                'email' => 'Usuario não encontrado.'
            ]);
        }

        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return back()->with('sucess', 'Senha alterada com sucesso!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}