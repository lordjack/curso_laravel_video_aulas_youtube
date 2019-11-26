<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ action('ClienteController@salvar', $cliente->id) }}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

        <label>Nome</label><br>
        <input type="text" name="nome" value="{{$cliente->nome}}"><br>
        <label>Telefone</label><br>
        <input type="text" name="telefone" value="{{$cliente->telefone}}"><br>
        <label>CPF</label><br>
        <input type="text" name="cpf" value="{{$cliente->cpf}}"><br>

        <button type="submit">Salvar</button>

    </form>
</body>

</html>
