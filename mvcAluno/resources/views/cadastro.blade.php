<!DOCTYPE html>
<html lang="{{ str_replace('_','_',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuarios</title>
</head>
<body>
    <h1>Cadastro Usuarios</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('aluno.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..." require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email..."
            required value="{{old('email')}}"
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