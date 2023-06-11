<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\ApplicationMode;

class ApplicationModeController extends Component
{
    //DEFINIMOS UNAS VARIABLES A USAR
    public $aplications, $description, $application_mode_id;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    public function render()
    {
        $this -> aplications = ApplicationMode::all();
        return view('livewire.application_modes.application-mode-controller');
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
            'description.required' => '',
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
        $this->description = '';
    }

    protected $messages = [
        'description.required' => 'Este campo debe estar lleno',
    ];

    public function store()
    {
        $this->validate([
            'description' => 'required|string',
        ]);

        ApplicationMode::updateOrCreate(['id' => $this->application_mode_id], [
            'description' => $this->description,
        ]);

        session()->flash('message', $this->application_mode_id ? 'Aplication mode updated!' : 'Aplication mode created!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $aplications = ApplicationMode::findOrFail($id);
        $this->application_mode_id = $id;
        $this->description = $aplications->description;

        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        ApplicationMode::find($this->getid)->delete();
        session()->flash('message', 'Aplication Mode removed!');
        $this->closeModaldelete();
    }
}
