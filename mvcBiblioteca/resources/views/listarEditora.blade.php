
<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório da Editora</title>
</head>
<body>
    <header>
        <h1>Relatório da Editora</h1>

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
                    <th>CNPJ</th>
                    <th>PAÍS</th>
                    <th>CIDADE</th>
                </tr>
            </thead>
            <tbody>
                @forelse($editoras as $editora)
                    <tr>
                        <td>{{ $editora->id }}</td>
                        <td>{{ $editora->nomeEditora }}</td>
                        <td>{{ $editora->cnpj }}</td>
                        <td>{{ $editora->pais }}</td>
                        <td>{{ $editora->cidade }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhuma EDITORA encontrada</td> 
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    
</body>
</html>