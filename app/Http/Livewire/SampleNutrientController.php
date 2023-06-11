<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SampleNutrient;
use App\Models\NutrientAnalysi;
use App\Models\Unit;
use App\Models\ChemicalElement;

class SampleNutrientController extends Component
{
    public $sample, $sample_nutrients_id, $nutrient_analysi_id, $unit_id, $chemical_element_id, $percentage, $lot;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    public function render()
    {
        $this->sample = SampleNutrient::all();
        return view('livewire.sample_nutrients.sample-nutrient-controller', [
            'nutrient_analysis' => NutrientAnalysi::all(),
            'units' => Unit::all(),
            'chemical_elements' => ChemicalElement::all()
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
        $this->sample_nutrients_id = '';
        $this->nutrient_analysi_id = '';
        $this->unit_id = '';
        $this->chemical_element_id = '';
        $this->percentage = '';
        $this->lot = '';
    }

    public function store()
    {
        $this->validate([
            'nutrient_analysi_id' => 'required',
            'unit_id' => 'required',
            'chemical_element_id' => 'required',
            'percentage' => 'required',
            'lot' => 'required'
        ]);

        SampleNutrient::updateOrCreate(['id' => $this->sample_nutrients_id], [
            'nutrient_analysi_id' => $this->nutrient_analysi_id,
            'unit_id' => $this->unit_id,
            'chemical_element_id' => $this->chemical_element_id,
            'percentage' => $this->percentage,
            'lot' => $this->lot
        ]);

        session()->flash('message', $this->sample_nutrients_id ? 'Muestra de Nutrientes actualizado!' : 'Muestra de nutrientes Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $sample_n = SampleNutrient::findOrFail($id);
        $this->sample_nutrients_id = $id;
        $this->nutrient_analysi_id = $sample_n->nutrient_analysi_id;
        $this->unit_id = $sample_n->unit_id;
        $this->chemical_element_id = $sample_n->chemical_element_id;
        $this->percentage = $sample_n -> percentage;
        $this->lot = $sample_n -> lot;
        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        SampleNutrient::find($this->getid)->delete();
        session()->flash('message', 'Muestra Nutricional eliminado!');
        $this->closeModaldelete();
    }
}
