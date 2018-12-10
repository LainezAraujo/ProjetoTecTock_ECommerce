@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h2 class="display-3">Lista de Serviços</h2>
    <a href="{{ url('servicos/novo') }}" class="btn  btn-secondary">Adicionar serviços</a>
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
    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Tipo Serviço</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Equipamento</th>
                <th scope="col">Cadastrado em</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <th scope="row">{{$service->id}}</th>
                    <td>{{$service->description}}</td>
                    <td>{{$service->serviceType->name}}</td>
                    <td>{{$service->person->name}}</td>
                    <td>{{$service->equipment->name}}</td>
                    <td>{{$service->created_at}}</td>
                    <td>
                        <a href="{{ action('ServiceController@destroy',$service->id) }}" class="btn btn-secondary "><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection