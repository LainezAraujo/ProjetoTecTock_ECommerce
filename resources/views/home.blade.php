@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h1 class="display-3"> {{Auth::user()->name}}, Bem vindo ao TecToc!</h1>
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="card" style="width: 16rem; height: 18.5rem;">
                <img class="card-img-top rounded mx-auto d-block" src="{{asset("img\user_logo.png")}}" alt="Pessoa Imagem">
                <div class="card-body">
                    <h5 class="card-title">Pessoa</h5>
                    <p class="card-text lead">Listagem e Novos Cadastros.</p>
                    <a href="{{ url('pessoas') }}" class="btn btn-secondary btn-md">Entrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center" >
            <div class="card" style="width: 16rem; height: 18.5rem;">
                <img class="card-img-top rounded mx-auto d-block" src="{{asset("img\monitor_logo.png")}}" alt="Equipamento Imagem">
                <div class="card-body">
                    <h5 class="card-title">Equipamento em Uso</h5>
                    <p class="card-text lead">Listagem de Equipamentos.</p>
                    <a href="{{ url('equipamentos') }}" class="btn btn-secondary btn-md">Entrar</a>
                </div>
            </div>
        </div>
        <!--NOVO-->
        <div class="col-md-3 text-center" >
            <div class="card" style="width: 16rem;height: 18.5rem;">
                <img class="card-img-top rounded mx-auto d-block" src="{{asset("img\monitor_logo.png")}}" alt="Equipamento Imagem">
                <div class="card-body">
                    <h5 class="card-title">Equipamento em Estoque</h5>
                    <p class="card-text lead">Listagem de Estoque.</p>
                    <a href="{{ url('equipamentos') }}" class="btn btn-secondary btn-md">Entrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="card" style="width: 16rem;height: 18.5rem;">
                <img class="card-img-top rounded mx-auto d-block" src="{{asset("img\document_logo.png")}}" alt="Serviço Imagem">
                <div class="card-body">
                    <h5 class="card-title">Serviços</h5>
                    <p class="card-text lead">Listagem de Serviços.</p>
                    <a href="{{ url('servicos') }}" class="btn btn-secondary btn-md">Entrar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
