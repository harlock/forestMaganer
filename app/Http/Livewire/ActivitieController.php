<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
use App\Models\Workday;
use App\Models\TypeJob;

class ActivitieController extends Component
{
    public $activiti, $activities_id, $workday_id, $type_job_id, $cost;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    public function render()
    {
        $this->activiti = Activity::all();

        return view('livewire.activities.activitie-controller',[
            'workdays' => Workday::all(),
            'type_jobs' => TypeJob::all()
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

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function closeModaldelete()
    {
        $this->isconfirm = false;
    }

    private function resetCreateForm(){
        $this->activities_id = '';
        $this->workday_id = '';
        $this->type_job_id = '';
        $this->cost = '';
    }

    public function store()
    {
        $this->validate([
            'workday_id' => 'required',
            'type_job_id' => 'required',
            'cost' => 'required',
        ]);

        Activity::updateOrCreate(['id' => $this->activities_id], [
            'workday_id' => $this->workday_id,
            'type_job_id' => $this->type_job_id,
            'cost' => $this->cost,
        ]);

        session()->flash('message', $this->activities_id ? 'Actividad actualizado!' : 'Actividad Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $actividad = Activity::findOrFail($id);
        $this->activities_id = $id;
        $this->workday_id = $actividad->workday_id;
        $this->type_job_id = $actividad->type_job_sample;
        $this->cost = $actividad->cost;
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Activity::find($this->getid)->delete();
        session()->flash('message', 'Actividad eliminado!');
        $this->closeModaldelete();
    }
}
