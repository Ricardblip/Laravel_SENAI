<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Filmes</title>
</head>
    <body>
        <h1>Controle de Filmes</h1>
        <a href="/autor/cadastrar">Cadastrar Autor</a>
        <br>
        <a href="/filme/cadastrar">Cadastrar Filme</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DATA LANÇAMENTO</th>
                    <th>SINOPSE</th>
                    <th>GENERO</th>
                    <th>ORÇAMENTO</th>
                    <th>AUTOR ID</th>
                    <th>NOME</th>
                    <th>DATA NASCIMENTO</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>ATUALIZAR</th>
                    <th>DELETAR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($Filmes as $Filme)
                    <tr>
                        <td>{{ $Filme->id }}</td>
                        <td>{{ $Filme->titulo }}</td>
                        <td>{{ $Filme->dataLancamento }}</td>
                        <td>{{ $Filme->sinopse }}</td>
                        <td>{{ $Filme->genero }}</td>
                        <td>{{ $Filme->orcamento }}</td>
                        <td>{{ $Filme->autor->id ?? 'N/A' }}</td>
                        <td>{{ $Filme->autor->nome ?? 'N/A'}}</td>
                        <td>{{ $Filme->autor->dataNascimento ?? 'N/A' }}</td>
                        <td>{{ $Filme->autor->email ?? 'N/A' }}</td>
                        <td>{{ $Filme->autor->telefone ?? 'N/A' }}</td>
                        <td>
                            <a href="{{route('filme.atualizar', $Filme->id)}}">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('filme.deletar', $Filme->id)}}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja deletar este filme?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                </tr>
                @empty
                    <tr>
                        <td colsoan="13">Nenhum Filme encontrado</td>
                    </tr>
                @endforelse
            </tbody>

            {{-- <br>

            <table border="1">
            <h1>Setores</h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME SETOR</th>
                </tr>
            </thead>
            <tbody>

            <tbody>
                @forelse($Produtos as $produto)
                    <tr>
                        <td>{{ $produto->setor->id }}</td>
                        <td>{{ $produto->setor->nome }}</td>
                </tr>
                @empty
                    <tr>
                        <td colsoan="3">Nenhum Setor encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table> --}}
    </body>
</html>