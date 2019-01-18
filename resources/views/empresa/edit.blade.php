@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Empresa') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                           class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                           name="nome" value="{{ $empresa->nome }}" required autofocus>

                                    @if ($errors->has('nome'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="tel"
                                           class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}"
                                           name="telefone" value="{{ $empresa->telefone }}" required>

                                    @if ($errors->has('telefone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="endereco"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

                                <div class="col-md-6">
                                    <input id="endereco" type="text"
                                           class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}"
                                           name="endereco" value="{{ $empresa->endereco }}" required>

                                    @if ($errors->has('endereco'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cep"
                                       class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                                <div class="col-md-6">
                                    <input id="cep" type="text"
                                           class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}"
                                           name="cep" value="{{ $empresa->cep }}" required>

                                    @if ($errors->has('cep'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cnpj"
                                       class="col-md-4 col-form-label text-md-right">{{ __('CNPJ') }}</label>

                                <div class="col-md-6">
                                    <input id="cnpj" type="text"
                                           class="form-control{{ $errors->has('cnpj') ? ' is-invalid' : '' }}"
                                           name="cnpj" value="{{ $empresa->cnpj }}" required>

                                    @if ($errors->has('cnpj'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
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
