<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Setores</title>
</head>
<body>
    <h1>Cadastro de Setor</h1>

    @if(session('sucess'))
        <p style="color:green">{{ session('sucess')}}</p>
    @endif

    <form action="{{ route('setor.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do setor..." require value="{{old('nome')}}">
        <br><br>

        <label for="nCorredor">N° Corredor:</label>
        <input type="number" name="nCorredor" id="nCorredor" placeholder="N° Corredor..." require value="{{old('nCorredor')}}">
        
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