@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h2>Lista de Pessoas</h2>
    <a href="{{ url('pessoas/novo') }}" class="btn  btn-secondary">Adicionar pessoas</a>

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
                    <button class="btn btn-secondary"><i class="fa fa-pencil-square"></i></button>
                    <button class="btn btn-secondary"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection