Lista de Pessoas
@foreach($persons as $person)
    <div>
        <ul>
            <li>{{ $person->name }}</li>
        </ul>
    </div>
@endforeach