@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Fornecedor') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('fornecedores.update', $fornecedor->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                           class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                           name="nome" value="{{ $fornecedor->nome }}" required autofocus>

                                    @if ($errors->has('nome'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="tel"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ $fornecedor->email }}" readonly>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mensalidade"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mensalidade') }}</label>

                                <div class="col-md-6">
                                    <input id="mensalidade" type="text"
                                           class="form-control{{ $errors->has('mensalidade') ? ' is-invalid' : '' }}"
                                           name="mensalidade" value="{{ $fornecedor->mensalidade }}" required>

                                    @if ($errors->has('mensalidade'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mensalidade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Alterar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
