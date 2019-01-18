@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Fornecedores') }}
                        <a class="btn btn-success" href="{{ route('fornecedores.create') }}">Cadastrar</a>
                        <a class="btn btn-warning" href="{{ route('fornecedores.somarMensalidades') }}">Somar
                            Mensalidades</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>E-mail</td>
                            <td>Mensalidade</td>
                            <td colspan="2">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fornecedores as $fornecedor)
                            <tr>
                                <td>{{$fornecedor->id}}</td>
                                <td>{{$fornecedor->nome}}</td>
                                <td>{{$fornecedor->email}}</td>
                                <td>{{$fornecedor->mensalidade}}</td>
                                <td><a href="{{ route('fornecedores.edit',$fornecedor->id)}}"
                                       class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('fornecedores.destroy', $fornecedor->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Você tem certeza?')"
                                                type="submit">Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
