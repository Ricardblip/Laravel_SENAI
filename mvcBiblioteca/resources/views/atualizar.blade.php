<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Informações</title>
</head>
<body>
    <header>
        <h1>Atualizar Livro</h1>

        <nav>
            <a href="/livro/listar">Voltar a tela de Listar Livros</a>
        </nav>
    </header>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <main>

        <form action="{{ route('livro.update', $livro->id) }}" method="POST">
            @csrf
            @method('PUT')

            Nome:
            <input type="text" name="nomeLivro" value="{{ old('nomeLivro', $livro->nomeLivro) }}" required>
            <br><br>

            Autor:
            <input type="text" name="autor" value="{{ old('autor', $livro->autor) }}" required>
            <br><br>

            Descrição:
            <input type="text" name="descricao" value="{{ old('descricao', $livro->descricao) }}" required>
            <br><br>

            Custo:
            <input type="text" name="custo" value="{{ old('custo', $livro->detalhe?->custo) }}" required>
            <br><br>

            Preço:
            <input type="text" name="preco_venda" value="{{ old('preco_venda', $livro->detalhe?->preco_venda) }}" required>
            <br><br>

            Imposto:
            <input type="text" name="imposto" value="{{ old('imposto', $livro->detalhe?->imposto) }}" required>
            
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

    </main>
    
</body>
</html>