<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\PersonRepository;
use App\Domain\Services\PersonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PersonController extends Controller
{
    private $personService;

    public function __construct()
    {
        $this->personService = new PersonService(new PersonRepository());
        $this->middleware('auth');
    }

    public function index()
    {
        $persons = $this->personService->findBy([]);

        return view('person.index')->with('persons', $persons);
    }

    public function create()
    {
        return view('person.create');
    }

    public function store(Request $request)
    {
        if ($person = $this->personService->create($request->all())) {
            $msg     = sprintf('%s foi cadastrado com sucesso', $person->name);
            $persons = $this->personService->findBy([]);

            return view('person.index')->with(['message' => $msg, 'persons' => $persons]);
        }

        return view('person.create')->with('errorsMsg', 'Falha as cadastrar pessoa! Tente novamente mais tarde.');
    }

    public function edit($id)
    {
        $person = $this->personService->findOneById($id);

        return View::make('person.edit')
            ->with('person', $person);
    }

    public function update(Request $request, $id)
    {
        if ($person = $this->personService->update($request->all(), $id)) {
            $msg     = sprintf('%s foi editado com sucesso', $person->name);
            $persons = $this->personService->findBy([]);

            return view('person.index')->with(['message' => $msg, 'persons' => $persons]);
        }

        return view('person.create')->with('errorsMsg', 'Falha as cadastrar pessoa! Tente novamente mais tarde.');
    }

    public function destroy($id)
    {
        $this->personService->delete($id);

        return redirect('pessoas');
    }
}
