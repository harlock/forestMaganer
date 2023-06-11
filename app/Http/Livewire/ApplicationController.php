<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Application;
use App\Models\Workday;
use App\Models\ApplicationMode;

class ApplicationController extends Component
{
    //Agregamos la variables a usar
    public $applications, $application_id, $workday_id, $application_mode_id, $date, $note;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    public function render()
    {
        //$this->applications = Application::all();
        return view('livewire.applications.application-controller',[
            'workdays' => Workday::all(),
            'application_modes' => ApplicationMode::all()
        ]);
    }
    public function mount($id){
        $this->application_id=$id;
        $this->applications=Workday::findOrFail($this->application_id);
        dd($this->applications);
        $this->render();
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
        $this->workday_id = '';
        $this->application_mode_id = '';
        $this->date = '';
        $this->note = '';
    }

    public function store()
    {
        $this->validate([
            'workday_id' => 'required',
            'application_mode_id' => 'required',
            'date' => 'required',
            'note' => 'required',
        ]);

        Application::updateOrCreate(['id' => $this->application_id], [
            'workday_id' => $this->workday_id,
            'application_mode_id' => $this->application_mode_id,
            'date' => $this->date,
            'note' => $this->note
        ]);

        session()->flash('message', $this->application_id ? 'Aplicacion actualizado!' : 'Aplicacion Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $aplicacions = Application::findOrFail($id);
        $this->application_id = $id;
        $this->workday_id = $aplicacions->workday_id;
        $this->application_mode_id = $aplicacions->application_mode_id;
        $this->date = $aplicacions->date;
        $this->note = $aplicacions->note;
        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete($id)
    {
        Application::find($this->getid)->delete();
        session()->flash('message', 'Aplicacion eliminado!');
        $this->closeModaldelete();
    }
}
