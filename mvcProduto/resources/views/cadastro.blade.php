<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{ route('produto.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Produto..." require value="{{old('nome')}}">
        <br><br>

        <label for="qntd">Quantidade:</label>
        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade..." require value="{{old('quantidade')}}">
        <br><br>

        <label for="qntd">Preço:</label>
        <input type="text" name="preco" id="preco" placeholder="Preço..." require value="{{old('preco')}}">
        <br><br>

        <label for="setor_id">Setor:</label>
        <select name="setor_id" id="setor_id" required>
            <option value="" disabled selected>Selecione um Setor</option>

            @foreach ($setores as $setor)
                <option value="{{ $setor->id }}">
                    Setor - {{ $setor->nome }} - N° {{ $setor->nCorredor }}
                </option>
            @endforeach
        </select>
        
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
</body>
</html>