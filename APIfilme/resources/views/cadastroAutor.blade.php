<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Autor</title>
</head>
    <body>
        <h1>Cadastro de Autor</h1>
        <a href="/filme/listar">Listar Filmes</a>
        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

        <form action="{{route('autor.salvar')}}" method="POST">
            @csrf
            <label for="nome">Nome: </label>
            <input type="text" name="nome" placeholder="Nome do autor" required value="{{ old('nome') }}">
            <br><br>

            <label for="dataNascimento">Data de Nascimento: </label>
            <input type="date" name="dataNascimento" required value="{{ old('dataNascimento') }}">
            <br><br>

            <label for="email">Email: </label>
            <input type="email" name="email" placeholder="Email do autor" required value="{{ old('email') }}">
            <br><br>

            <label for="telefone">Telefone: </label>
            <input type="text" name="telefone" placeholder="Telefone do autor" required value="{{ old('telefone') }}">
            <br><br>
            
            <input type="submit" value="Cadastrar">
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