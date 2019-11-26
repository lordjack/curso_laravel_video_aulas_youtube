<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function listar()
    {
        //select * from cliente order by nome;
        $clientes  = Cliente::orderBy('nome')->get();

        return view('clientes')->with('clientes', $clientes);
    }

    public function cadastrar()
    {
        return view('clienteCadastrar');
    }

    public function editar($id)
    {

        $cliente  = Cliente::find($id);

        return view('clienteEditar')->with('cliente', $cliente);
    }

    public function deletar($id)
    {
        //select * from cliente where id = $id
        $cliente  = Cliente::find($id);

        if (empty($cliente)) {
            return "<h2>Erro ao consultar o id informado</h2>";
        }
        //delete from cliente where id = $id
        $cliente->delete();

        return redirect()->action('ClienteController@listar');
    }

    public function pesquisar(Request $request)
    {
        $nome = $request->input('nome');

        $query = DB::table('cliente');

        if (!empty($nome)) {
            $query->where('nome', 'like', '%' . $nome . '%');
        }

        $clientes = $query->orderBy('nome')->paginate(20);

        return view('clientes')->with('clientes', $clientes);
    }


    public function salvar(Request $request, $id)
    {

        if ($id == 0) {
            $cliente = new Cliente();
            $cliente->nome = $request->input('nome');
            $cliente->telefone = $request->input('telefone');
            $cliente->cpf = $request->input('cpf');

            // dd($cliente);
            $cliente->save();

            return redirect()->action('ClienteController@listar');
        } else {
            //select * from cliente where id = $id
            $cliente = Cliente::find($id);
            $cliente->nome = $request->input('nome');
            $cliente->telefone = $request->input('telefone');
            $cliente->cpf = $request->input('cpf');

            $cliente->save();

            return redirect()->action('ClienteController@listar');
        }
    }
}
