<!DOCTYPE html>
<html lang="{{ str_replace('_','_',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Turmas</title>
</head>
<body>
    <h1>Cadastro Turmas</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('turma.salvar')}}" method="POST">
        @csrf
        <label for="numSala">Nome: </label>
        <input type="number" name="numSala" id="numSala" placeholder="numero da sala..." require value="{{ old('numSala') }}"
        >
        <br><br>
        <label for="serie">Serie: </label>
        <input type="text" name="serie" id="serie" placeholder="Serie..."
            required value="{{old('serie')}}"
        >

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <Ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro}}</li>
                @endforeach
            </Ul>
        </div>
    @endif
</body>
</html>