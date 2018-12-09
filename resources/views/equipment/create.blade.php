@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h2 class="display-3">Cadastrar Equipamentos</h2>
    @if(isset($errorsMsg))
        <div class="alert alert-danger" role="alert">
            {{ $errorsMsg }}
        </div>
    @endif
    <form method="POST" action="{{ action('EquipmentController@store') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <label for="nameinput">Nome</label>
            <input class="form-control" id="nameinput" placeholder="Nome" name="name" required>
        </div>
        <div class="form-group">
            <label for="descriptioninput">Descrição</label>
            <input class="form-control" id="descriptioninput" placeholder="Descrição" name="description" required>
        </div>
        <div class="form-group">
            <label for="servicetaginput">Service Tag</label>
            <input class="form-control" id="servicetaginput" placeholder="Etiqueta de Serviço: AFADF-312" name="service_tag" required>
        </div>

        <button type="submit" class="btn btn-secondary">Salvar</button>
    </form>


@endsection