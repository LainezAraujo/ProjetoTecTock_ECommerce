@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src={{asset("img\userlogo.png")}} alt="Card image logo">
                <div class="card-body">
                    <h5 class="card-title">Pessoa</h5>
                    <p class="card-text">Listagem e novos cadastros.</p>
                    <a href="#" class="btn  btn-secondary">Entrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src={{asset("img\pclogo.png")}} alt="Card image logo">
                <div class="card-body">
                    <h5 class="card-title">Equipamento</h5>
                    <p class="card-text">Listagem de equipamentos.</p>
                    <a href="#" class="btn btn-secondary">Entrar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src={{asset("img\documentlogo.png")}} alt="Card image logo">
                <div class="card-body">
                    <h5 class="card-title">Relatório</h5>
                    <p class="card-text">Gerar relatórios.</p>
                    <a href="#" class="btn btn-secondary">Entrar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
