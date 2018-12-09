@extends('layouts.default')

@section('title')
    TecToc
@endsection
@section('content')
    <h2 class="display-3">Cadastrar Serviços</h2>
    @if(isset($errorsMsg))
        <div class="alert alert-danger" role="alert">
            {{ $errorsMsg }}
        </div>
    @endif
    <form method="POST" action="{{ action('ServiceController@store') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="user_id" type="hidden" value="{{Auth::user()->id}}"/>
        <div class="form-group">
            <label for="descriptioninput">Descrição</label>
            <input class="form-control" id="descriptioninput" placeholder="Descrição" name="description" required>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="servicetypeinput">Tipo de Serviço</label>
                <select class="form-control" id="servicetypeinput" name="service_type_id" required>
                    @foreach($serviceTypes as $serviceType)
                        <option value="{{ $serviceType['id'] }}"> {{ $serviceType['value'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="equipinput">Equipamento</label>
                <select class="form-control" id="equipinput" name="equipment_id" required>
                    @foreach($equipment as $equip)
                        <option value="{{ $equip->id }}"> {{ $equip->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="personinput">Pessoa</label>
                <select class="form-control" id="personinput" name="person_id" required>
                    @foreach($persons as $person)
                        <option value="{{ $person->id }}"> {{ $person->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary">Salvar</button>
    </form>
@endsection