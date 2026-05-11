<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro usuários</title>
</head>
<body>
    <h1>Cadastro Usuários</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('aluno.salvar') }}" method="POST">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome..." required value="{{ old('nome') }}">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email..." required value="{{ old('email') }}">
        <br><br>

        <label for="turma_id">Turma:</label>
        <select name="turma_id" id="turma_id" required>
            <option value="" disabled selected>Selecione uma turma</option>

            @foreach ($turmas as $turma)
                <option value="{{ $turma->id }}">
                    Sala {{ $turma->numSala }} - {{ $turma->serie }}
                </option>
            @endforeach
        </select>

        <br><br>
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