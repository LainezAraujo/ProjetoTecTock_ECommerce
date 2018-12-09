@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h2 class="display-2">Lista de Pessoas</h2>
    <a href="{{ url('pessoas/novo') }}" class="btn  btn-secondary">Adicionar pessoas</a>
    @if(isset($message))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Cargo</th>
            <th scope="col">Cadastrado em</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($persons as $person)
            <tr>
                <th scope="row">{{$person->id}}</th>
                <td>{{$person->name}}</td>
                <td>{{$person->cpf}}</td>
                <td>{{$person->cargo}}</td>
                <td>{{$person->created_at}}</td>
                <td>
                    <a href="{{ action('PersonController@edit',$person->id) }}" class="btn btn-secondary "><i class="fa fa-pencil-square"></i></a>
                    <a href="{{ action('PersonController@destroy',$person->id) }}" class="btn btn-secondary "><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection