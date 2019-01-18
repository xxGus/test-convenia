@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mensalidades') }}
                        <a class="btn btn-warning" href="{{ route('fornecedores.index') }}">Voltar</a>
                    </div>
                    <div class="card-body">
                        <p><strong>Total de Mensalidades: R$</strong>{{ $total }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection