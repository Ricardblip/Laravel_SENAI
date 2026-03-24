<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>
</head>
<body>
    <h1>Relatório de Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto);
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>
                        <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum PRODUTO encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>