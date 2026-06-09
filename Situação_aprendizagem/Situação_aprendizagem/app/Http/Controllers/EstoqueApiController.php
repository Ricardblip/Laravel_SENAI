<?php
// estou no SetorApiController.php
namespace App\Http\Controllers;
use App\Models\Producao;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(){
        $setores = Setores::all();
        return response()->json($setores);
    }

    public function addApi(Request $request){
try{
        $request->validate([
            'produto' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
            // para poder ser nulo ou existir na tabela setores
        ]);

        $setor = Setores::create([
            'produto' => $request->produto,
            'num_setor' => $request->num_setor
        ]);

        return response()->json([
            'success'=> true,
            'message' => 'Setor Criado',
            'setor' => $setor
        ], 201);
    }catch(\Illuminate\Validation\ValidationException $e){
        return response ()->json([
            'success'=> false,
            'message'=> 'Erro de validação',
            'errors'=> $eerrors()
        ],422);
    }catch(\Exception $e){
        return response()->json([
            'success'=> false,
            'message'=> 'erro interno no servidor',
            'errors' => $e->errors()
        ],500);
    }

}
    public function update(Request $request, $id){
try{
        $request->validate([
            'produto' => 'required|string|max:255',
           'num_setor' => ' required|numeric|max:255'
            // para poder ser nulo ou existir na tabela setores
        ]);

        $setor = Setores::findOrFail($id); // buscar setor para ser atualizado
  

        $setor->produto = $request->produto; // atualizando o campo produto
        $setor->num_setor = $request->num_setor; // atualizando o campo quantidade

        $setor->save(); // salvando no banco de dados(fazendo update)




        return response()->json([
            'message'=> 'setor atualizado!',
            'setor'=> $setor,
        ],200);
    }catch(\Illuminate\Validation\ValidationException $e){
        return responde()->json([
            'success'=> false,
            'message'=> 'erro de validação',
            'errors'=>$e->Errors()
        ],422);
    }catch(\Illuminate\Database\Eloquent\ModelnotFundException $e){
        return response()->json([
            'success'=>false,
            'message'=> 'setor não encontrado'
        ],404);
    }catch(\Exception $e){
        return response()->json([
            'success'=> false,
            'message'=> 'erro interno no servidor',
            'errors' => $e->errors()
        ],500);
    }


}

    public function deletarApi($id){
        try{
        $setor = Setores::findOrFail($id); // buscar o produto para depois deletar
        $produto->delete(); 

          return redirect()->json([
            'message'=> "Setor Deletado com Sucesso!"
          ],200);
        }catch(\Illuminate\Database\Eloquent\ModelnotFundException $e){
        return response()->json([
            'success'=>false,
            'message'=> 'setor não encontrado'
        ],404);
    }catch(\Exception $e){
        return response()->json([
            'success'=> false,
            'message'=> 'erro interno no servidor',
            'errors' => $e->errors()
        ],500);
    }
}
}