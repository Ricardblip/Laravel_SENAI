<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Produto</title>
</head>
<body>
    <h1>Atualizar Produto</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('produto.update', $produto->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" required>

        <input type="text" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}" required>

        <input type="text" name="preco" value="{{ old('preco', $produto->preco) }}" required>

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