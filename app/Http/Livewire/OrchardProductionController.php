<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AnnualProduction;
use App\Models\Orchard;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class OrchardProductionController extends Component
{
    public $datos_huerto, $annual_productions, $annual_production_id, $orchard_id, $ton_harvest, $date_production, $sale, $damage_percentage;
    public $isModalOpen = 0;
    public $isconfirm = 0;
    public $getid = 0;
    public $idd, $route;


    protected $currentDateTime;

    public $inicioCalendario;
    public $finCalendario;
    public $fecha;
    public $anio;
    public $countMes = 1;
    public $etiquetaDias = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
    public $meses = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre',
    ];




    public function render()
    {



        $id_orchard = Orchard::findOrFail($this->idd);
        $this->annual_productions = AnnualProduction::join("orchards", "orchards.id", "annual_productions.orchard_id")
            ->where("annual_productions.orchard_id", $this->idd)
            ->get();
        //dd($id_orchard->id);
        $data_harvest = $this->annual_production_harvest();
        $data_sales = $this->annual_production_sales();
        //dd($data_harvest);
        //dd($data_sales);
        return view(
            'livewire.orchards_production_manager.new_production ',
            [
                'orchards' => Orchard::all(),
                'datos_orchard' => $id_orchard,

            ],
            compact('data_harvest', 'data_sales')
        );
    }

    public function annual_production_harvest()
    {
        $id_orchard = Orchard::findOrFail($this->idd);
        $tonHarvest = AnnualProduction::selectRaw('MONTH(date_production) as date')
            ->groupBy('date')
            ->selectRaw('sum(ton_harvest) as production')->where("annual_productions.orchard_id", $id_orchard->id)
            ->pluck("production");
        //   dd($tonHarvest);
        $months = AnnualProduction::select(DB::raw("Month(date_production ) as month"))
            ->whereYear('date_production', date('Y'))->where("annual_productions.orchard_id", $id_orchard->id)
            ->groupBy(DB::raw("Month(date_production)"))
            ->pluck('month');
        //dd($months);
        $data_harvest = array(0, 0, 0,   0, 0, 0,   0, 0, 0,   0, 0, 0);
        foreach ($months as $i => $tonHarve) {
            $data_harvest[$tonHarve - 1] = $tonHarvest[$i];
        }
        //dd($data_harvest);
        return $data_harvest;
    }
    public function annual_production_sales()
    {
        $id_orchard = Orchard::findOrFail($this->idd);
        $sales = AnnualProduction::selectRaw('MONTH(date_production) as date')
            ->groupBy('date')
            ->selectRaw('sum(sale) as production')->where("annual_productions.orchard_id", $id_orchard->id)
            ->pluck("production");
        //dd($sales);
        $months = AnnualProduction::select(DB::raw("Month(date_production ) as month"))
            ->whereYear('date_production', date('Y'))->where("annual_productions.orchard_id", $id_orchard->id)
            ->groupBy(DB::raw("Month(date_production)"))
            ->pluck('month');
        //dd($months);
        $data_sales = array(0, 0, 0,     0, 0, 0,   0, 0, 0,   0, 0, 0);
        foreach ($months as $i => $sale) {
            $data_sales[$sale - 1] = $sales[$i];
        }
        //dd($data_sales);
        return $data_sales;
    }
    public function change($id)
    {
        //return redirect()->to(url()->previous());
        //back();
        return redirect()->route('calendar/{{$id}}');
    }
    public function mount($id)
    {
        $this->orchard_id = $id;
        $this->idd = $id;
        $this->render();

        $this->currentDateTime = now();

        $this->countMes = $this->currentDateTime->format('n');
        $this->inicioCalendario = $this->currentDateTime->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $this->finCalendario = $this->currentDateTime->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
        $this->fecha = $this->currentDateTime->copy();
        $this->anio = $this->currentDateTime->copy()->format('Y');
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    public function openModaldelete()
    {
        $this->isconfirm = true;
    }
    public function closeModaldelete()
    {
        $this->isconfirm = false;
    }
    private function resetCreateForm()
    {

        $this->orchard_id = '';
        $this->ton_harvest = '';
        $this->date_production = '';
        $this->sale = '';
        $this->damage_percentage = '';
    }
    public function store()
    {

        $this->validate([
            'ton_harvest' => 'required',
            'date_production' => 'required',
            'sale' => 'required',
            'damage_percentage' => 'required',
        ]);

        $id_orchard = Orchard::findOrFail($this->idd);
        AnnualProduction::updateOrCreate(['id' => $this->annual_production_id], [
            'orchard_id' => $id_orchard->id,
            'ton_harvest' => $this->ton_harvest,
            'date_production' => $this->date_production,
            'sale' => $this->sale,
            'damage_percentage' => $this->damage_percentage,
        ]);
        //dd($id_orchard->id);
        session()->flash('message', $this->annual_production_id ? 'Producción Anual Actualizada!' : 'Producción Anual Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $annual_productions = AnnualProduction::findOrFail($id);
        $this->annual_production_id = $id;
        $this->orchard_id = $annual_productions->orchard_id;
        $this->ton_harvest = $annual_productions->ton_harvest;
        $this->date_production = $annual_productions->date_production;
        $this->sale = $annual_productions->sale;
        $this->damage_percentage = $annual_productions->damage_percentage;

        $this->openModalPopover();
    }
    public function ConfirmaDelete($id)
    {
        $this->openModaldelete();
        $this->getid = $id;
    }
    public function delete()
    {
        AnnualProduction::find($this->getid)->delete();
        session()->flash('message', 'Elemento Activo eliminado!');
        $this->closeModaldelete();
    }




    ///////////////////////////////////////CALENDARIO 


    /**
     * Metodo para incrementar, tanto por mes, como por año
     */
    public function incrementar($objeto)
    {
        // Creamos una instacia de la fecha con el mes, y año que está en la vista
        $this->currentDateTime = Carbon::createFromFormat('n/Y', $this->countMes . '/' . $this->anio);

        // Si el parametro es M es porque se incrementa un mes,
        // por lo que nos valemos del metodo addMonth de Carbon
        if ($objeto == "m") {
            $this->inicioCalendario = $this->currentDateTime->copy()
                ->addMonth()
                ->firstOfMonth()
                ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                ->addMonth()
                ->lastOfMonth()
                ->endOfWeek(Carbon::SATURDAY);

            // establecemos los valores para mes y año que figuran en la vista
            $this->countMes = (int) $this->currentDateTime->copy()->addMonth()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->addMonth()->format('Y');
        } else {
            // Si el parametro es A es porque se incrementa un año,
            // por lo que nos valemos del metodo addYear de Carbon
            $this->inicioCalendario = $this->currentDateTime->copy()
                ->addYear()
                ->firstOfMonth()
                ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                ->addYear()
                ->lastOfMonth()
                ->endOfWeek(Carbon::SATURDAY);
            // establecemos los valores para mes y año que figuran en la vista
            $this->countMes = (int) $this->currentDateTime->copy()->addYear()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->addYear()->format('Y');
        }
    }

    /**
     * Metodo para decrementar, tanto por mes, como por año
     * La lógica es la misma que para el incremento,
     * pero utilizando los metodos subMonth y subYear de Carbon
     */
    public function decrementar($objeto)
    {
        $this->currentDateTime = Carbon::createFromFormat('n/Y', $this->countMes . '/' . $this->anio);

        if ($objeto == "m") {
            $this->inicioCalendario = $this->currentDateTime->copy()
                ->subMonth()
                ->firstOfMonth()
                ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                ->subMonth()
                ->lastOfMonth()
                ->endOfWeek(Carbon::SATURDAY);

            $this->countMes = (int) $this->currentDateTime->copy()->subMonth()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->subMonth()->format('Y');
        } else {
            $this->inicioCalendario = $this->currentDateTime->copy()
                ->subYear()
                ->firstOfMonth()
                ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                ->subYear()
                ->lastOfMonth()
                ->endOfWeek(Carbon::SATURDAY);

            $this->countMes = (int) $this->currentDateTime->copy()->subYear()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->subYear()->format('Y');
        }
    }


}
