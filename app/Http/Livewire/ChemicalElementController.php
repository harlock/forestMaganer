<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ChemicalElement;

class ChemicalElementController extends Component
{
    public $chemical_elements, $name, $chemical_code,$chemical_element_id;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    protected $messages = [
        'name.required' => 'Este campo no debe de estar vacio',
        'chemical_code.required' => 'Este campo no debe de estar vacio',
        'chemical_code.alpha_num'=>"Solo Alfanumerico",

    ];

    public function render()
    {
        $this->chemical_elements = ChemicalElement::all();
        return view('livewire.chemical_elements.chemical-element-controller');
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
            'name.required' => '',
            'chemical_code.required' =>'',
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
        $this->name = '';
        $this->chemical_code = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'chemical_code' => 'required|alpha_num',
        ]);

        ChemicalElement::updateOrCreate(['id' => $this->chemical_element_id], [
            'name' => $this->name,
            'chemical_code' => $this->chemical_code,
        ]);

        session()->flash('message', $this->chemical_element_id ? 'Chemical Element updated!' : 'Chemical Element created!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }


    public function edit($id)
    {
        $chemical_element = ChemicalElement::findOrFail($id);
        $this->chemical_element_id = $id;
        $this->name = $chemical_element->name;
        $this->chemical_code = $chemical_element->chemical_code;

        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        ChemicalElement::find($this->getid)->delete();
        session()->flash('message', 'Chemical Element removed!');
        $this->closeModaldelete();
    }
}
