<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TypeJob;

class TypeJobController extends Component
{
    //Definimos variables a usar
    public $Jobs, $type_job, $type_job_id;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    public function render()
    {
        $this->Jobs = TypeJob::all();
        return view('livewire.type_jobs.type-job-controller');
    }

    public function create(){
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover(){
        $this->isDialogOpen = true;
    }

    public function closeModalPopover(){
        $this->isDialogOpen = false;
        $this->validate([
            'type_job.required' => '',
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

    public function resetCreateForm(){
        $this->type_job = '';
    }

    protected $messages = [
        'type_job.required' => 'Este campo debe estar lleno',
    ];

    public function store(){
        $this->validate([
            'type_job' => 'required|alpha',
        ]);

        TypeJob::updateOrCreate(['id' => $this->type_job_id], [
            'type_job' => $this->type_job,
        ]);

        session()->flash('message', $this->type_job_id ? 'tipo de trabajo actualizada' : 'tipo de trabajo agregada');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id){
        $type_Jobs = TypeJob::findOrFail($id);
        $this->type_job_id = $id;
        $this->type_job = $type_Jobs->type_job;
        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete(){
        TypeJob::find($this->getid)->delete();
        session()->flash('message', 'Trabajo removido!');
        $this->closeModaldelete();
    }
}
