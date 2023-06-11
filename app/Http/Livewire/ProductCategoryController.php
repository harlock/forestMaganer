<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class ProductCategoryController extends Component
{
    //DEFINIMOS UNAS VARIABLES A USAR
    public $categorie, $description, $product_categorie_id;
    public $isDialogOpen = 0;
    public $isconfirm =0;
    public $getid =0;

    public function render()
    {
        $this->categorie=ProductCategory::all();
        return view('livewire.product_categories.product-category-controller');
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
        'description.required' => 'Este campo no debe de estar vacio',
    ];

    public function store()
    {
        $this->validate([
            'description' => 'required|string',
        ]);

        ProductCategory::updateOrCreate(['id' => $this->product_categorie_id], [
            'description' => $this->description,
        ]);

        session()->flash('message', $this->product_categorie_id ? 'Categoria de Producto Actualizado!' : 'Categoria de Producto Creado!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $product_categorie = ProductCategory::findOrFail($id);
        $this->product_categorie_id = $id;
        $this->description = $product_categorie->description;

        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        ProductCategory::find($this->getid)->delete();
        session()->flash('message', 'Categoria de Producto Eliminado!');
        $this->closeModaldelete();
    }
}
