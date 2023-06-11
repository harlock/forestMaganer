<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TypeSoil;


class TypeSoilController extends Component
{
    public $type_soils, $type_soils_id, $type_soil;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;


    public function render()
    {
        $this->type_soils = TypeSoil::all();

        return view('livewire.type_soils.type-soil-controller');
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
        $this->validate([
            'type_soil.required' => '',
        ]);
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

        $this->type_soil = '';

    }

    protected $messages = [
        'type_soil.required' => 'Este campo debe estar lleno',
    ];

    public function store()
    {

        $this->validate([
            'type_soil' => 'required|alpha',
        ]);


        TypeSoil::updateOrCreate(['id' => $this->type_soils_id], [
            'type_soil' => $this->type_soil,

        ]);

        session()->flash('message', $this->type_soils_id ? 'Tipo de Suelo actualizado!' : 'Tipo de Suelo Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }


    public function edit($id)
    {
        $type_soils = TypeSoil::findOrFail($id);
        $this->type_soils_id = $id;
        $this->type_soil = $type_soils->type_soil;


        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        TypeSoil::find($this->getid)->delete();
        session()->flash('message', 'Tipo de Suelo eliminado!');
        $this->closeModaldelete();
    }
}
