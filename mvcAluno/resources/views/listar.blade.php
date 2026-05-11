<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Relatório de Alunos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>ID TURMA</th>
                <th>SERIE</th>
                <th>NUM SALA</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </th>
    </thead>
    <tbody>
        @forelse($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id}}</td>
                <td>{{ $aluno->nome}}</td>
                <td>{{ $aluno->email }}</td>
                <td> {{ $aluno->turma?->id}}</td>
                <td>{{ $aluno->turma?->serie}}</td>
                <td>{{ $aluno->turma?->numSala}}</td>
                <td>
                    <a href="{{route('aluno.atualizar', $aluno->id)}}">Atualizar</a>
                </td>
                <td> 
                    <form action="{{ route('aluno.deletar', $aluno->id)}}" method="POST"
                        onsubmit="return confirm('Deseja realmente excluir');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                </form>
                </td>
            <tr>
        @empty
            <tr>
                <td colspan="3"> Nenhum Aluno encontrado</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>