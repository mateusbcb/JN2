@extends('estrutura.index')

@section('title', 'Clientes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Clientes</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table align-middle table-hover caption-top">
                        <caption>
                            <a href="/cliente" class="btn btn-primary">Novo</a>
                        </caption>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>Placa do Carro</th>
                                <th>Criado em</th>
                                <th>Ultima atualização</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)    
                            <tr onclick="link({{$cliente->id}})" style="cursor: pointer">
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>{{ $cliente->placa_do_carro }}</td>
                                <td>{{ \carbon\Carbon::create($cliente->created_at)->format('d-m-Y H:i:s') }}</td>
                                <td>{{ \carbon\Carbon::create($cliente->updated_at)->settings(['locale' => 'pt_BR', 'timezone' => 'America/Sao_Paulo'])->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function link(id)
        {
            window.location = '/cliente_perfil/' + id;
        }
    </script>
@endsection
