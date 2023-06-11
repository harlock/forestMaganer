<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supplie;
use App\Models\ProductCategory;
use App\Models\MarkSupplie;
use Livewire\WithFileUploads;

class SupplyController extends Component
{
    use WithFileUploads;

    public $supply, $supply_id, $name, $registry_number, $unit_id, $data_sheet, $security_term, $product_category_id, $mark_supplie_id;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;


    public function render()
    {
        $this->supply = Supplie::all();
        return view('livewire.supplies_orchards.supply-controller', [
            'product_categories' => ProductCategory::all(),
            'mark_supplies' => MarkSupplie::all(),
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

    private function resetCreateForm()
    {
        $this->name = '';
        $this->registry_number = '';
        $this->data_sheet = '';
        $this->security_term = '';
        $this->unit_id = '';
        $this->product_category_id = '';
        $this->mark_supplie_id = '';
    }


    public function store()
    {
        $this->validate([
            'name' => 'required',
            'registry_number' => 'required',
            'data_sheet' => 'required',
            'security_term' => 'required',
            'product_category_id' => 'required',
            'mark_supplie_id' => 'required',
        ],[
            'data_sheet.required' => 'Agrega el archivo.',
            'data_sheet.max' => 'El archivo no debe ser mayor a 5mb.',
            'data_sheet.mimes' => 'El archivo debe ser un PDF',
        ]);

        $this->data_sheet=$this->data_sheet->store('files_supplies','public');

        Supplie::updateOrCreate(['id' => $this->supply_id], [
            'name' => $this->name,
            'registry_number' => $this->registry_number,
            'data_sheet' => $this->data_sheet,
            'security_term' => $this->security_term,
            'unit_id' => $this->unit_id,
            'product_category_id' => $this->product_category_id,
            'mark_supplies_id' => $this->mark_supplie_id,
        ]);

        session()->flash('message', $this->supply_id ? 'Suministro actualizado!' : 'Suministro Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }


    public function edit($id)
    {
        $supply = Supplie::findOrFail($id);
        $this->supply_id = $id;
        $this->name = $supply->name;
        $this->registry_number = $supply->registry_number;
        $this->data_sheet = $supply->data_sheet;
        $this->security_term = $supply->security_term;
        $this->product_category_id = $supply->product_category_id;
        $this->mark_supplie_id = $supply->mark_category_id;

        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        Supplie::find($this->getid)->delete();
        session()->flash('message', 'Suministro eliminado!');
        $this->closeModaldelete();
    }
}
