@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h2>Cadastrar Pessoas</h2>
    <form method="POST" action="{{ action('PersonController@store') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <label for="nameinput">Nome</label>
            <input  class="form-control" id="nameinput" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="cpfinput">CPF</label>
            <input  class="form-control" id="cpfinput" placeholder="CPF">
        </div>
        <div class="form-group">
            <label for="cargoinput">Nome</label>
            <input  class="form-control" id="cargoinput" placeholder="Cargo">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>


@endsection