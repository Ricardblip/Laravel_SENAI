<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro - Livro</title>
</head>
<body>
    <header>
        <h1>Cadastro Livro</h1>

        <nav>
            <a href="/livro/listar">Listar Livros</a>
        </nav>
    </header>

    <main>
        <form action="{{ route('livro.salvar') }}" method="POST">
            @csrf

            <label for="nomeLivro">Nome:</label>
            <input type="text" name="nomeLivro" id="nomeLivro" placeholder="Nome..." require value="{{old('nomeLivro')}}">
            <br><br>

            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" placeholder="Autor..." require value="{{old('autor')}}">
            <br><br>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" placeholder="Descrição..." require value="{{old('descricao')}}">
            <br><br>

            <label for="setor_id">Editora:</label>
            <select name="editora_id" id="editora_id" required>
                <option value="" disabled selected>Selecione uma Editora</option>

                @foreach ($editoras as $editora)
                    <option value="{{ $editora->id }}">
                        Editora - {{ $editora->nomeEditora }}
                    </option>
                @endforeach
            </select>
            <br><br>

            <label for="custo">Custo:</label>
            <input type="text" name="custo" id="custo" placeholder="Custo..." require value="{{old('custo')}}">
            <br><br>

            <label for="preco">Preço:</label>
            <input type="text" name="preco_venda" id="preco_venda" placeholder="Preço..." require value="{{old('preco_venda')}}">
            <br><br>

            <label for="imposto">Imposto:</label><input type="text" name="imposto" id="imposto" placeholder="Imposto..." require value="{{old('imposto')}}">
        
            <input type="submit" value="Cadastrar">

        </form>

        @if($errors->any())
            <div style="color:red">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

    </main>
    
</body>
</html>