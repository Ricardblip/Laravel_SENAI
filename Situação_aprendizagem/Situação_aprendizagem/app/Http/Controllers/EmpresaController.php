<?php
// estou no EmpresaController.php
namespace App\Http\Controllers;
use App\Models\Produçao;
use App\Models\Estoque;
use App\Models\Cliente;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function listar(){
        $produtos = Pedidos::with(['setor', 'detalhesPedido'])->get();
        return view('listarPedido', compact('pedido'));
    }

    public function cadastro(){
        if(auth()->user()->tipo != 'usuario'){
            abort(403);
            
        }

        $setores = Setores::get();
        return view('cadastroProduto', compact('setores'));
    }

    public function add(Request $request){

        $request->validate([
            'valores' => 'required|string|max:255',
            'tipo' => 'required|numeric|max:255',
            'datafabricacao' => 'required|numeric',
            'setor_id' => 'nullable|exists:setores,id' 
        ]);

        $empresa = Produto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'valor' => $request->valor,
            'setor_id' => $request->setor_id
        ]);

        DetalhePedidos::create([
            'descricao' => $request->descricao,
            'peso' => $request->peso,
            'tamanho' => $request->tamanho,
            'produto_id' => $empresa->id
        ]);

        return redirect()->back()->with('success','Produto Cadastrado no estoque!');

    }

    public function atualizar($id){
        $empresa = Produto::findOrFail($id); // Busca o produto pelo ID
        $setores = Setores::get();
        // select * from produtos where id = $id
        return view('atualizarProduto', compact('empresa','setores'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'produto' => 'required|string|max:255',
            'estoque' => 'required|numeric|max:255',
            'clientes' => 'required|numeric',
            'setor_id' => 'nullable|exists:setores,id' 
            // para poder ser nulo ou existir na tabela setores
        ]);

        $produto = Produto::findOrFail($id); // buscar aluno para ser atualizado
        $detalhe = DetalheProdutos::where('produto_id', $produto->id)->first();

        $produto->produto = $request->produto; // atualizando o campo produtos
        $produto->estoque = $request->estoque; // atualizando o campo estoque
        $produto->clientes = $request->clientes; // atualizando o campo clientes
        $produto->setor_id = $request->setor_id; // atualizando o campo setor_id

        $produto->save(); // salvando no banco de dados(fazendo update)

        $detalhe->descricao = $request->descricao;
        $detalhe->tamanho = $request->tamanho;
        $detalhe->peso = $request->peso;

        $detalhe->save();

        return redirect()->back()->with('success','Produto atualizado no estoque!');
    }

    public function deletar($id){
        $produto = Produto::findOrFail($id); // buscar o produto para depois deletar
        $detalhe = DetalheProdutos::where('produto_id', $produto->id)->first();
        $produto->delete(); // faz o delete no banco de dados
        $detalhe->deletar();

        return redirect()->route('produto.listar')
            ->with('success','Produto excluído do estoque com sucesso!');
    }

}