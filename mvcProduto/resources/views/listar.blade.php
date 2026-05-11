<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>
</head>
<style>
    table{
        text-align: center
    }
</style>
<body>
    <h1>Relatório de Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
                <th>ID SETOR</th>
                <th>SETOR</th>
                <th>N° CORREDOR</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto);
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ $produto->setor?->id }}</td>
                    <td>{{ $produto->setor?->nome }}</td>
                    <td>{{ $produto->setor?->nCorredor }}</td>
                    <td>
                        <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('produto.deletar', $produto->id)}}" method="POST" onsubmit="return confirm('Deseja realmente excluir')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Nenhum PRODUTO encontrado</td> 
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>