<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NutrientAnalysi;
use App\Models\Orchard;

class NutrientAnalysiController extends Component
{
    public $nutrient, $nutrient_analysis_id, $orchar_id, $date_sample, $path;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    public function render()
    {
        $this->nutrient = NutrientAnalysi::all();
        return view('livewire.nutrient_analysis.nutrient-analysi-controller',[
            'orchards' => Orchard::all()
        ]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isDialogOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isDialogOpen = false;
    }

    public function openModaldelete()
    {
        $this->isconfirm = true;
    }

    public function closeModaldelete()
    {
        $this->isconfirm = false;
    }

    private function resetCreateForm(){
        $this->nutrient_analysis_id = '';
        $this->orchar_id = '';
        $this->date_sample = '';
        $this->path = '';
    }

    public function store()
    {
        $this->validate([
            'orchard_id' => 'required',
            'date_sample' => 'required',
            'path' => 'required',
        ]);

        NutrientAnalysi::updateOrCreate(['id' => $this->nutrient_analysis_id], [
            'orchard_id' => $this->orchar_id,
            'date_sample' => $this->date_sample,
            'path' => $this->path,
        ]);

        session()->flash('message', $this->nutrient_analysis_id ? 'Analisis Nutricional actualizado!' : 'Analisi nutricional Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $analicis = NutrientAnalysi::findOrFail($id);
        $this->nutrient_analysis_id = $id;
        $this->orchar_id = $analicis->orchard_id;
        $this->date_sample = $analicis->date_sample;
        $this->path = $analicis->path;
        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        NutrientAnalysi::find($this->getid)->delete();
        session()->flash('message', 'Analicis Nutricional eliminado!');
        $this->closeModaldelete();
    }
}
