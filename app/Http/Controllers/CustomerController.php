<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return view('paginas.index');
    }

    // Lista os Clientes
    public function customers()
    {
        if (Auth::check()) {
            
            $id_user = Auth::user()['id'];

            $clientes = DB::table('customers')
            ->select([
                'id',
                'nome',
                'telefone',
                'cpf',
                'placa_do_carro',
                'created_at',
                'updated_at',
            ])
            ->where('id_user', '=', $id_user)
            ->get();

            return view('paginas.customers', [
                'clientes' => $clientes,
            ]);
        }else {
            return redirect('/login');
        }
    }

    // Criar novo Cliente
    public function criar_cliente()
    {
        if (Auth::check()) {
            return view('paginas.createCliente');
        }else {
            return redirect('/login');
        }
    }

    // Criar novo Cliente
    public function criar_cliente_action(request $req)
    {
        if (Auth::check()) {

            $id_user = Auth::user()['id'];

            DB::table('customers')
            ->insert([
                'id_user' => $id_user,
                'nome' => $req->nome,
                'telefone' => $req->telefone,
                'cpf' => $req->cpf,
                'placa_do_carro' => $req->placa,
                'created_at' => Carbon::now('America/Sao_Paulo'),
                'updated_at' => Carbon::now('America/Sao_Paulo'),
            ]);

            return redirect('/customers');

        }else {
            return redirect('/login');
        }
    }

    // editar Cliente
    public function editar_cliete($id)
    {
        if (Auth::check()) {
            $cliente = DB::table('customers')
            ->select([
                'id',
                'nome',
                'telefone',
                'cpf',
                'placa_do_carro',
            ])
            ->where('id', '=', $id)
            ->get()
            ->toArray();

            if (!$cliente) {
                return redirect()->back()->with('error', 'Cliente não encontrado!');
            }

            return view('paginas.editCliente', [
                'cliente' => $cliente,
            ]);
        }else {
            return redirect('/login');
        }
    }

    // Ação de remover Cliente
    public function editar_cliete_acton(Request $req)
    {
        $cliente = DB::table('customers')
        ->where('id', '=', $req->id)
        ->update([
            'nome' => $req->nome,
            'telefone' => $req->telefone,
            'cpf' => $req->cpf,
            'placa_do_carro' => $req->placa,
            'updated_at' => Carbon::now('America/Sao_Paulo'),
        ]);

        if (!$cliente) {
            return redirect()->back()->with('error', 'Cliente não encontrado!');
        }

        return redirect('/customers')->with('successo', 'Problema ao atualizar o Cliente!');
    }

    // remover Cliente
    public function remover_cliente($id)
    {
        if (Auth::check()) {
            DB::table('customers')
            ->where('id', '=', $id)
            ->delete();

            return redirect('/customers')->with('successo', 'Cliente Removido com sucesso!');
        }else {
            return redirect('/login');
        }
    }

    // consultar Cliente
    public function consultar_cliente($id)
    {
        if (Auth::check()) {
            $cliente = DB::table('customers')
            ->select([
                'id',
                'nome',
                'telefone',
                'cpf',
                'placa_do_carro',
            ])
            ->where('id', '=', $id)
            ->get()
            ->toArray();
            
            if (!$cliente) {
                return redirect()->back()->with('error', 'Cliente não encontrado!');
            }

            return view('paginas.perfilCliente', [
                'cliente' => $cliente
            ]);
        }else {
            return redirect('/login');
        }
    }

    // consultar Placa
    public function consultar_placa(Request $req)
    {
        if (Auth::check()) {
            echo "<div>";
                $search = $req->input('busca');
                
                $placa = DB::table('customers')
                ->select([
                    'id',
                    'nome',
                    'telefone',
                    'placa_do_carro',
                    'updated_at',
                ])
                ->where('placa_do_carro', 'like', '%'.$search.'%')
                ->get();
                
                echo "<div class='list-group'>";
                    foreach ($placa as $item) {
                        echo "<a href='/cliente_perfil/".$item->id."' class='list-group-item list-group-item-action'>".
                            "<div class='d-flex w-100 justify-content-between'>".
                                "<h5 class='mb-1'>".$item->nome ."</h5>".
                                "<small class='text-muted'>".Carbon::create($item->updated_at)->settings(['locale' => 'pt_BR'])->diffForHumans().
                            "</div>".
                            "<p class='mb-1'>Telefone - ".$item->telefone."</p>".
                            "<p class='mb-1'>Placa - ".$item->placa_do_carro."</p>".
                        "</a>";
                    }
                echo "</div>";
            echo "</div>";
        }else {
            return redirect('/login');
        }
    }
}
