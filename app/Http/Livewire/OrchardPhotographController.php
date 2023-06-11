<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Photograph;
use App\Models\Orchard;
use App\Models\TypePhotograph;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrchardPhotographController extends Component
{
    use WithFileUploads;
    public $photographs, $photograph_id, $orchard_id, $type_photograph_id, $path, $date,$note;
    public $isDialogOpen =0;
    public $isconfirm =0;
    public $getid =0;
    public $idd;

    protected $currentDateTime;

    public $fecha;
    public $anio;
    public $countMes = 1;
    public $meses = [ 1 => 'Enero',
                      2 => 'Febrero',
                      3 => 'Marzo',
                      4 => 'Abril',
                      5 => 'Mayo',
                      6 => 'Junio',
                      7 => 'Julio',
                      8 => 'Agosto',
                      9 => 'Septiembre',
                      10 => 'Octubre',
                      11 => 'Noviembre',
                      12 => 'Diciembre', ];

    public function render()
    {
        $id_orchard = Orchard::findOrFail($this->idd);
        $nombre_huerto=$id_orchard->name_orchard;


        $this->photographs = Photograph::join("orchards", "orchards.id", "photographs.orchard_id")
        ->where("photographs.orchard_id", $id_orchard->id)
        ->whereYear("photographs.date",$this->anio)
        ->whereMonth("photographs.date",$this->countMes)
        ->get();

        //dd($this->anio);
        //dd($this->countMes);
        //dd($this->meses);
            
        return view('livewire.orchards_photographs.photographs_index', [
            'orchards' => Orchard::all(),
            'type_photographs' => TypePhotograph::all(),
            'datos_orchard' => $id_orchard,
            'nombre_huerto' => $nombre_huerto,
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
        $this->orchard_id = '';
        $this->type_photograph_id = '';
        $this->path = '';
        $this->date = '';
        $this->note = '';
    }

    public function store()
    {

        $this->validate([
            'type_photograph_id' => 'required',
            'path' => 'required',
            'date' => 'required',
            'note' => 'required',
        ]);
        $this->path=$this->path->store('images/photographs', 'public');
        //dd($this->path);
        $id_orchard = Orchard::findOrFail($this->idd);
        Photograph::updateOrCreate(['id' => $this->photograph_id], [
            'orchard_id' => $id_orchard->id,
            'type_photograph_id' => $this->type_photograph_id,
            'path' => $this->path,
            'date' => $this->date,
            'note' => $this->note,
        ]);

        session()->flash('message', $this->photograph_id ? 'Fotografia actualizada!' : 'Fotografia Creada!');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $photographs = Photograph::findOrFail($id);
        $this->photograph_id = $id;
        $this->orchard_id = $photographs->orchard_id;
        $this->type_photograph_id = $photographs->type_photograph_id;
        $this->path = $photographs->path;
        $this->date = $photographs->date;
        $this->note = $photographs->note;
        $this->openModalPopover();
    }

    public function ConfirmaDelete($id){
        $this->openModaldelete();
        $this->getid = $id;
    }

    public function delete()
    {
        Photograph::find($this->getid)->delete();
        session()->flash('message', 'Fotografia eliminada!');
        $this->closeModaldelete();
    }






    //////////////////////////////////////////////////////inicializamos calendario
    public function mount($id)
    { 
        $this->orchard_id = $id;
        $this->idd = $id;
        $this->render();
        $this->currentDateTime = now();
        $this->currentDateTime->day= 10;

        //dd($this->currentDateTime);


        $this->countMes = $this->currentDateTime->format('n');
        
        $this->fecha = $this->currentDateTime->copy();
        $this->anio = $this->currentDateTime->copy()->format('Y');
        $this->currentDateTime->day= 10;
     
        //dd($this->anio);
    }

    /**
     * Metodo para incrementar, tanto por mes, como por año
     */
    public function incrementar($objeto)
    {
        // Creamos una instacia de la fecha con el mes, y año que está en la vista
        $this->currentDateTime = Carbon::createFromFormat('n/Y', $this->countMes.'/'.$this->anio);

        $this->currentDateTime->day= 10;
        
        // Si el parametro es M es porque se incrementa un mes,
        // por lo que nos valemos del metodo addMonth de Carbon
        if ($objeto == "m") {
            //->addMonthsNoOverflow()
            $this->countMes = (int) $this->currentDateTime->copy()->addMonth()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->addMonth()->format('Y');
            
        } else {

            // establecemos los valores para mes y año que figuran en la vista
            $this->countMes = (int) $this->currentDateTime->copy()->addYear()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->addYear()->format('Y');
        }
    }

    /**
     * Metodo para decrementar, tanto por mes, como por año
     * La lógica es la misma que para el incremento,
     * pero utilizando los metodos subMonth y subYear de Carbon
     */
    public function decrementar($objeto)
    {
        $this->currentDateTime = Carbon::createFromFormat('n/Y', $this->countMes.'/'.$this->anio);
        $this->currentDateTime->day= 10;
        if ($objeto == "m") {

            $this->countMes = (int) $this->currentDateTime->copy()->subMonth()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->subMonth()->format('Y');
        } else {

            $this->countMes = (int) $this->currentDateTime->copy()->subYear()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->subYear()->format('Y');
        }
    }
}
