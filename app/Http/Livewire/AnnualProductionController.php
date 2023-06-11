<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AnnualProduction;
use App\Models\Orchard;
use Illuminate\Support\Facades\DB;

class AnnualProductionController extends Component
{
    public $annual_productions, $annual_production_id, $orchard_id, $ton_harvest, $date_production, $sale, $damage_percentage;
    public $isDialogOp = 0;
    public $isconfirm = 0;
    public $getid = 0;


    public function render()
    {
        $sales = AnnualProduction::select(DB::raw("sale as count"))
        ->pluck("count");
        $tonHarvest = AnnualProduction::selectRaw('MONTH(date_production) as date')
            ->groupBy('date')
            ->selectRaw('sum(ton_harvest) as production')
            ->pluck("production");
        //dd($tonHarvest);
        //SELECT Month(date_production ) as month,SUM(`ton_harvest`) as count from annual_productions GROUP BY Month(date_production)
        //SELECT SUM(`ton_harvest`) as count from annual_productions GROUP BY Month(date_production)
        $months = AnnualProduction::select(DB::raw("Month(date_production ) as month"))
            ->whereYear('date_production', date('Y'))
            ->groupBy(DB::raw("Month(date_production)"))
            ->pluck('month');
        $datas = array(0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $tonHarve) {
            $datas[$tonHarve] = $tonHarvest[$index];
        }
        $datass = array(0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $sale) {
            $datass[$sale] = $sales[$index];
        }
        $this -> annual_productions = AnnualProduction::all();
        return view('livewire.annual_productions.annual-production-controller ', [
            'orchards' => Orchard::all(),
        ],
        compact( 'datas', 'datass'));
    }


    public function create()
    {

        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isDialogOp = true;
    }

    public function closeModalPopover()
    {
        $this->isDialogOp = false;
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
            'orchard_id' => 'required',
            'ton_harvest' => 'required',
            'date_production' => 'required',
            'sale' => 'required',
            'damage_percentage' => 'required',
        ]);


        AnnualProduction::updateOrCreate(['id' => $this->annual_production_id], [
            'orchard_id' => $this->orchard_id,
            'ton_harvest' => $this->ton_harvest,
            'date_production' => $this->date_production,
            'sale' => $this->sale,
            'damage_percentage' => $this->damage_percentage,
        ]);

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
}
