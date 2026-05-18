<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de filmes - Atualizar</title>
</head>
    <body>
        <h1>Controle de Filmes - Atualizar</h1>
        <a href="/filme/listar">Voltar para a lista de filmes</a>
        @if(session('success'))
            <p style="color:green">{{ session('success')}}</p>
        @endif

        <form action="{{route('filme.update', $filme->id)}}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="titulo" value="{{ old('titulo', $filme->titulo) }}" required>

            <input type="date" name="dataLancamento" value="{{ old('dataLancamento', $filme->dataLancamento) }}" required>
            
            <input type="text" name="sinopse" value="{{ old('sinopse', $filme->sinopse) }}" required>

            <input type="text" name="genero" value="{{ old('genero', $filme->genero) }}" required>

            <input type="number" name="orcamento" value="{{ old('orcamento', $filme->orcamento) }}" required>

            <br><hr><br>

            <input type="text" name="nome" value="{{ old('nome', $filme->autor->nome) }}" required>

            <input type="date" name="dataNascimento" value="{{ old('dataNascimento', $filme->autor->dataNascimento) }}" required>

            <input type="email" name="email" value="{{ old('email', $filme->autor->email) }}" required>

            <input type="text" name="telefone" value="{{ old('telefone', $filme->autor->telefone) }}" required>

            <button type="submit">Atualizar</button>
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