@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h1 class="display-3"> {{Auth::user()->name}}, Bem vindo ao TecToc!</h1>
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset("img\userlogo.png")}}" alt="Pessoa Imagem">
                <div class="card-body">
                    <h5 class="card-title">Pessoa</h5>
                    <p class="card-text lead">Listagem e novos cadastros.</p>
                    <a href="{{ url('pessoas') }}" class="btn  btn-secondary">Entrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center" >
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset("img\pclogo.png")}}" alt="Equipamento Imagem">
                <div class="card-body">
                    <h5 class="card-title">Equipamento</h5>
                    <p class="card-text lead">Listagem de equipamentos.</p>
                    <a href="{{ url('equipamentos') }}" class="btn btn-secondary">Entrar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset("img\documentlogo.png")}}" alt="Serviço Imagem">
                <div class="card-body">
                    <h5 class="card-title">Serviços</h5>
                    <p class="card-text lead">Listagem de Serviços.</p>
                    <a href="#" class="btn btn-secondary">Entrar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
