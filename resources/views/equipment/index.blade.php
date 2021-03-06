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
    @if(isset($errorsMsg))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{$errorsMsg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Service Tag</th>
            <th scope="col">Proprietário</th>
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
                @if (isset($equip->actualUser->name) && !empty($equip->actualUser->name)))
                    <td>{{  $equip->actualUser->name }}</td>
                @elseif (isset($equip->oldUser->name) && !empty($equip->oldUser->name))
                    <td>{{  $equip->oldUser->name }}</td>
                @else
                    <td></td>
                @endif
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