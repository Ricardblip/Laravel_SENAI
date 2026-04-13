<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório dos Livros</title>
</head>
<body>
    <header>
        <h1>Relatório dos Livros</h1>

        <nav>
            <a href="/editora/cadastrar">Cadastrar Editora</a>
            <br>
            <a href="/livro/cadastrar">Cadastrar Livro</a>
        </nav>
    </header>

    <main>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>AUTOR</th>
                    <th>DESCRIÇÃO</th>
                    <th>NOME EDITORA</th>
                    <th>CUSTO</th>
                    <th>PREÇO VENDA</th>
                    <th>IMPOSTO</th>
                    <th>ATUALIZAR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($livros as $livro)
                    <tr>
                        <td>{{ $livro->id }}</td>
                        <td>{{ $livro->nomeLivro }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->descricao }}</td>
                        <td>{{ $livro->editora?->nomeEditora }}</td>
                        <td>{{ $livro->detalhe->custo ?? '' }}</td>
                        <td>{{ $livro->detalhe->preco_venda ?? '' }}</td>
                        <td>{{ $livro->detalhe->imposto ?? '' }}</td>
                        
                        <td>
                            <a href="{{route('livro.atualizar', $livro->id)}}">Atualizar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Nenhum LIVRO encontrado</td> 
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    
</body>
</html>