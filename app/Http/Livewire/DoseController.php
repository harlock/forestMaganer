<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dose;
use App\Models\Application;
use App\Models\ChemicalElement;
use App\Models\Unit;

class DoseController extends Component
{
    //Agregamos la variables a usar
    public $dose, $dose_id, $application_id, $chemical_element_id, $unit_id, $doses;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    public function render()
    {
        $this->doses = Dose::all();
        return view('livewire.doses.dose-controller',[
            'applications' => Application::all(),
            'chemical_elements' => ChemicalElement::all(),
            'units' => Unit::all()
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
        $this->dose_id = '';
        $this->application_id = '';
        $this->chemical_element_id = '';
        $this->unit_id = '';
        $this->dose = '';
    }

    public function store()
    {
        $this->validate([
            'application_id' => 'required',
            'chemical_element_id' => 'required',
            'unit_id' => 'required',
            'dose' => 'required',
        ]);

        Dose::updateOrCreate(['id' => $this->dose_id], [
            'application_id' => $this->application_id,
            'chemical_element_id' => $this->chemical_element_id,
            'unit_id' => $this->unit_id,
            'dose' => $this->dose
        ]);

        session()->flash('message', $this->dose_id ? 'Dosis actualizado!' : 'Dosis Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $dosis = Dose::findOrFail($id);
        $this->dose_id = $id;
        $this->application_id = $dosis->application_id;
        $this->chemical_element_id = $dosis->chemical_element_id;
        $this->unit_id = $dosis->unit_id;
        $this->dose = $dosis->dose;
        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        Dose::find($this->getid)->delete();
        session()->flash('message', 'Dosis eliminado!');
        $this->closeModaldelete();
    }
}
