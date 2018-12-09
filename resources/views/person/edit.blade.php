@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h2>Editar Pessoa</h2>
    @if(isset($errorsMsg))
        <div class="alert alert-danger" role="alert">
            {{ $errorsMsg }}
        </div>
    @endif

    <form method="POST" action="{{ action('PersonController@update', $person->id) }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <label for="nameinput">Nome</label>
            <input class="form-control" id="nameinput" placeholder="Nome" name="name"  value="{{ $person->name }}" required>
        </div>
        <div class="form-group">
            <label for="cpfinput">CPF</label>
            <input type="number" class="form-control" id="cpfinput" placeholder="CPF" name="cpf" value="{{ $person->cpf }}" required>
        </div>
        <div class="form-group">
            <label for="cargoinput">Cargo</label>
            <input class="form-control" id="cargoinput" placeholder="Cargo" name="cargo"  value="{{ $person->cargo }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection