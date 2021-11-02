@extends('estrutura.index')

@section('title', 'Perfil do Cliente')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Perfil do Cliente</h1>
            </div>
        </div>

        <div class="row">
            <div class="col col-10 mx-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 border">
                            <img src="img/profiles/{{$cliente[0]->id}}.jpg" alt="{{ $cliente[0]->nome }}">
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-4 col-sm-6">
                                    Nome
                                </div>
                                <div class="col-8 col-sm-6">
                                    {{ $cliente[0]->nome }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-sm-6">
                                    Telefone
                                </div>
                                <div class="col-8 col-sm-6">
                                    {{ $cliente[0]->telefone }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-sm-6">
                                    CPF
                                </div>
                                <div class="col-8 col-sm-6">
                                    {{ $cliente[0]->cpf }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-sm-6">
                                    Placa do Carro
                                </div>
                                <div class="col-8 col-sm-6">
                                    {{ $cliente[0]->placa_do_carro }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="/cliente_edit/{{$cliente[0]->id}}" class="btn btn-primary">Editar</a>
                                <a href="/cliente_delete/{{$cliente[0]->id}}" class="btn btn-danger">Remover</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection