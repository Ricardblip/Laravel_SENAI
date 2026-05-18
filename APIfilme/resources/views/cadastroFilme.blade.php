<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Filmes</title>
</head>
    <body>
        <h1>Cadastro de Filmes</h1>
        <a href="/filme/listar">Listar Filmes</a>
        @if(@session('success'))
            <p style="color: green">{{ session('succes') }}</p>
        @endif

        <form action="{{route('filme.salvar')}}" method="POST">
            @csrf
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo" placeholder="Título do filme" required value="{{ old('titulo') }}">
            <br><br>

            <label for="dataLancamento">Data de Lançamento: </label>
            <input type="date" name="dataLancamento" id="dataLancamento" required value="{{ old('dataLancamento') }}">
            <br><br>

            <label for="sinopse">Sinopse: </label>
            <input type="text" name="sinopse" id="sinopse" placeholder="Sinopse do filme" required value="{{ old('sinopse') }}">
            <br><br>

            <label for="genero">Gênero: </label>
            <input type="text" name="genero" id="genero" placeholder="Gênero do filme" required value="{{ old('genero') }}">
            <br><br>

            <label for="orcamento">Orçamento: </label>
            <input type="number" name="orcamento" id="orcamento" placeholder="Orçamento do filme" required value="{{ old('orcamento') }}">
            <br><br>

            <label>Autor:</label>
            <select name="autor_id" id="autor_id">
                @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                @endforeach
            </select>
            <br><br>

            <input type="submit" value="cadastrar">
        </form>

        @if($errors->any())
            <div style="color: red">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>