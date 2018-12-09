@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h2 class="display-3">Lista de Equipamentos</h2>
    <a href="{{ url('equipamentos/novo') }}" class="btn  btn-secondary">Adicionar equipamentos</a>
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
            <th scope="col">Descrição</th>
            <th scope="col">Service Tag</th>
            <th scope="col">Atual Proprietário</th>
            <th scope="col">Cadastrado em</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($equipment as $equip)
            <tr>
                <th scope="row">{{$equip->id}}</th>
                <td>{{$equip->name}}</td>
                <td>{{$equip->description}}</td>
                <td>{{$equip->service_tag}}</td>
                <td>{{$equip->actual_user}}</td>
                <td>{{$equip->created_at}}</td>
                <td>
                    <a href="{{ action('EquipmentController@edit',$equip->id) }}" class="btn btn-secondary "><i class="fa fa-pencil-square"></i></a>
                    <a href="{{ action('EquipmentController@destroy',$equip->id) }}" class="btn btn-secondary "><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection