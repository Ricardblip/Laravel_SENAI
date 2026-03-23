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
                <td> Faremos na proxima aula </td>
                <td> Faremos na proxima aula </td>
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