<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\EquipmentRepository;
use App\Domain\Services\EquipmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Fluent;

class EquipmentController extends Controller
{
    private $equipmentService;

    public function __construct()
    {
        $this->equipmentService = new EquipmentService(new EquipmentRepository());
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $equipment = $this->equipmentService->findAllBy($request->all());

        return view('equipment.index')->with('equipment', $equipment);
    }

    public function create()
    {
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        if ($equipment = $this->equipmentService->create($request->all())) {
            $msg       = sprintf('%s foi cadastrado com sucesso', $equipment->name);
            $equipment = $this->equipmentService->findBy([]);

            return view('equipment.index')->with(['message' => $msg, 'equipment' => $equipment]);
        }

        return view('equipment.create')->with('errorsMsg',
            'Falha as cadastrar equipamento! Tente novamente mais tarde.');
    }

    public function edit($id)
    {
        $equipment = $this->equipmentService->findOneById($id);

        return View::make('equipment.edit')->with('equipment', $equipment);
    }

    public function update(Request $request, $id)
    {
        if ($person = $this->equipmentService->update($request->all(), $id)) {
            $msg       = sprintf('%s foi editado com sucesso', $person->name);
            $equipment = $this->equipmentService->findBy([]);

            return view('equipment.index')->with(['message' => $msg, 'equipment' => $equipment]);
        }

        return view('equipment.create')->with('errorsMsg', 'Falha as cadastrar equipamento! Tente novamente mais tarde.');
    }

    public function destroy($id)
    {
        $equip = $this->equipmentService->findOneById($id);
        if (!is_null($equip->actual_user)) {
            $equipment = $this->equipmentService->findBy([]);
            $msg = sprintf('O equipamento %s está em uso!', $equip->name);
            return view('equipment.index')->with(['errorsMsg' => $msg, 'equipment' => $equipment]);
        }
        $this->equipmentService->delete($id);

        return redirect('equipamentos');
    }
}
