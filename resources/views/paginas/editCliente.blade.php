@extends('estrutura.index')

@section('title', 'Editar Cliente')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Editar - {{$cliente[0]->nome}}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col col-6 mx-auto">
                <form class="row g-1" action="/cliente_edit" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$cliente[0]->id}}">

                    <div class="col-md-12 mt-3 mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control {{--is-valid--}}" name="nome" id="nome" value="{{$cliente[0]->nome}}" required>
                            {{-- <div class="valid-feedback">
                                Looks good!
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                            </span>
                            <input type="tel" class="form-control {{--is-invalid--}}" name="telefone" id="telefone" value="{{$cliente[0]->telefone}}" aria-describedby="inputGroupPrepend3 telefoneFeedback" required>
                            {{-- <div id="telefoneFeedback" class="invalid-feedback">
                            Please choose a username.
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                    <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control {{--is-invalid--}}" name="cpf" id="cpf"  value="{{$cliente[0]->cpf}}" aria-describedby="cpfFeedback" required>
                            {{-- <div id="cpfFeedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                        <label for="placa_do_carro" class="form-label">Placa do Carro</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control {{--is-invalid--}}" name="placa" id="placa_do_carro" value="{{$cliente[0]->placa_do_carro}}" aria-describedby="placa_do_carroFeedback" required>
                            {{-- <div id="placa_do_carroFeedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success" type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection