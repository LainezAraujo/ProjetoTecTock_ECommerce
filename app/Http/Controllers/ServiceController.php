<?php

namespace App\Http\Controllers;

use App\Domain\Models\ServiceType;
use App\Domain\Repositories\EquipmentRepository;
use App\Domain\Repositories\PersonRepository;
use App\Domain\Repositories\ServiceRepository;
use App\Domain\Services\EquipmentService;
use App\Domain\Services\PersonService;
use App\Domain\Services\ServicoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Fluent;

class ServiceController extends Controller
{
    private $equipmentService;
    private $servicoService;
    private $personService;

    public function __construct()
    {
        $this->middleware('auth');

        $this->equipmentService = new EquipmentService(new EquipmentRepository());
        $this->servicoService   = new ServicoService(new ServiceRepository());
        $this->personService    = new PersonService(new PersonRepository());
    }

    public function index()
    {
        $services = $this->servicoService->findBy([]);

        return view('service.index')->with('services', $services);
    }

    public function create()
    {
        $services     = $this->servicoService->findBy([]);
        $serviceTypes = [
            ServiceType::NOVO      => ['id' => ServiceType::NOVO, 'value' => 'Novo Equipamento'],
            ServiceType::DEVOLUCAO => ['id' => ServiceType::DEVOLUCAO, 'value' => 'Devolução']
        ];
        $persons      = $this->personService->findBy([]);
        $equipment    = $this->equipmentService->findBy([]);

        return view('service.create')->with([
            'services'     => $services,
            'serviceTypes' => $serviceTypes,
            'persons'      => $persons,
            'equipment'    => $equipment
        ]);
    }

    public function store(Request $requestArray)
    {
        $request = new Fluent($requestArray->all());

        if ($request->{'service_type_id'} == ServiceType::NOVO) {
            $equipment              = $this->equipmentService->findOneById($request->{'equipment_id'});
            $equipment->old_user    = $equipment->actual_user;
            $equipment->actual_user = $request->{'person_id'};
            $this->equipmentService->updateOnlyUsers($equipment);

            if ($service = $this->servicoService->create($requestArray->all())) {
                $msg      = 'Serviço foi cadastrado com sucesso';
                $services = $this->servicoService->findBy([]);

                return view('service.index')->with(['message' => $msg, 'services' => $services]);
            }
        } elseif ($request->{'service_type_id'} == ServiceType::DEVOLUCAO) {
            $equipment              = $this->equipmentService->findOneById($request->{'equipment_id'});
            $equipment->old_user    = $request->{'person_id'};
            $equipment->actual_user = null;
            $this->equipmentService->updateOnlyUsers($equipment);

            if ($service = $this->servicoService->create($requestArray->all())) {
                $msg      = 'Serviço foi cadastrado com sucesso';
                $services = $this->servicoService->findBy([]);

                return view('service.index')->with(['message' => $msg, 'services' => $services]);
            }
        }

        return view('service.create')->with('errorsMsg', 'Falha as cadastrar Serviço! Tente novamente mais tarde.');
    }

    public function destroy($id)
    {
        $this->servicoService->delete($id);

        return redirect('servicos');
    }
}
