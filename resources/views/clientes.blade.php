<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <a href="{{ url('/cliente/cadastrar') }}">Cadastrar Cliente</a>

    <form action="{{ action('ClienteController@pesquisar')}}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

        <label>Nome</label><br>
        <input type="text" name="nome"><br>

        <button type="submit">Pesquisar</button>

    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
        @foreach ($clientes as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nome}}</td>
            <td>{{$item->telefone}}</td>
            <td>{{$item->cpf}}</td>
            <td>
                <a href="{{ action('ClienteController@editar',$item->id )}}"> Editar </a>
                <a href="{{ action('ClienteController@deletar',$item->id )}}"> Deletar </a>
            </td>
        </tr>

        @endforeach

    </table>
</body>

</html>
