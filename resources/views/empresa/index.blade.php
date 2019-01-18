@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Empresa') }}</div>

                    @if(isset($empresa))
                        <div class="card-body">
                            <p><strong>Nome:</strong> <span>{{$empresa->nome}}</span></p>
                            <p><strong>Telefone:</strong><span> {{$empresa->telefone}}</span></p>
                            <p><strong>Endereço:</strong> <span>{{$empresa->endereco}}</span></p>
                            <p><strong>CEP:</strong> <span>{{$empresa->cep}}</span></p>
                            <p><strong>CNPJ:</strong> <span>{{$empresa->cnpj}}</span></p>
                            <a class="btn btn-info" href="{{ route('empresa.edit', $empresa->id) }}">Alterar</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
