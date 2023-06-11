<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Phenophase;
use Livewire\WithFileUploads;


class PhenophaseController extends Component
{
    use WithFileUploads;

    public $phenophases, $pheno_id, $phenophase, $description, $image;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;


    public function render()
    {
        $this->phenophases = Phenophase::all();
        return view('livewire.phenophases.phenophase-controller');
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

    private function resetCreateForm()
    {
        $this->phenophase = '';
        $this->description = '';
        $this->image = '';
    }

    protected $message = [
        'phenophase.required' => 'Este campo debe estar lleno',
        'description.required' => 'Este campo debe estar lleno',
        'image.required' => 'Debes de agregar una imagen',
    ];

    public function store()
    {
        $this->validate([
            'phenophase' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $this->image = $this->image->store('images_phenophases', 'public');

        Phenophase::updateOrCreate(['id' => $this->pheno_id], [
            'phenophase' => $this->phenophase,
            'description' => $this->description,
            'image' => $this->image,
        ]);

        session()->flash('message', $this->pheno_id ? 'Fenofase Actualizado!' : 'Fenofase Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }


    public function edit($id)
    {
        $phenophases = Phenophase::findOrFail($id);
        $this->pheno_id = $id;
        $this->phenophase = $phenophases->phenophase;
        $this->description = $phenophases->description;
        $this->image = $phenophases->image;

        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        Phenophase::find($this->getid)->delete();
        session()->flash('message', 'Fenofase eliminado!');
        $this->closeModaldelete();
    }
}
