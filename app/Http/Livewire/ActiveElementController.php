<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ActiveElement;
use App\Models\ChemicalElement;
use App\Models\Supplie;


class ActiveElementController extends Component
{
    public $active_elements, $active_element_id, $chemical_element_id, $supply_id,$percentage;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;


    public function render()
    {
        $this->active_elements = ActiveElement::all();

        return view('livewire.active_elements.active-element-controller', [
            'chemical_elements' => ChemicalElement::all(),
            'supplies_orchards' => Supplie::all(),
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

        $this->chemical_element_id = '';
        $this->supply_id = '';
        $this->percentage = '';
    }

    protected $messages = [
        'chemical_element_id.required' => 'Este campo debe estar lleno',
        'supply_id.required' => 'Este campo debe estar lleno',
        'percentage.required' => 'Este campo debe estar lleno',
    ];

    public function store()
    {

        $this->validate([
            'chemical_element_id' => 'required',
            'supply_id' => 'required',
            'percentage' => 'required',
        ]);


        ActiveElement::updateOrCreate(['id' => $this->active_element_id], [
            'chemical_element_id' => $this->chemical_element_id,
            'supply_id' => $this->supply_id,
            'percentage' => $this->percentage,
        ]);

        session()->flash('message', $this->active_element_id ? 'Elemento Activo Actualizado!' : 'Elemento Activo Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }


    public function edit($id)
    {
        $active_element = ActiveElement::findOrFail($id);
        $this->active_element_id = $id;
        $this->chemical_element_id = $active_element->chemical_element_id;
        $this->supply_id = $active_element->supply_id;
        $this->percentage = $active_element->percentage;

        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete($id)
    {
        ActiveElement::find($this->getid)->delete();
        session()->flash('message', 'Elemento Activo eliminado!');
        $this->closeModaldelete();
    }
}
