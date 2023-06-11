<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\RegistrationPhenophase;
use App\Models\Orchard;
use App\Models\Phenophase;

class OrchardManagerController extends Component
{
    public $orchard_id = 0, $nav = 0;
    public $datos;
    public $isconfirm = 0;
    public $getid = 0;

    public function render()
    {
        if ($this->nav == 1) {
            $datos = $this->informacion();
            return view('livewire.manager_orchards.orchard-manager-controller', ['datos_orchard' => $datos]);
        }
    }

    public function mount($id)
    {
        $this->orchard_id = $id;
        $this->nav = 1;
        $this->render();
    }

    public function informacion()
    {
        $datos = Orchard::findOrFail($this->orchard_id);
        //$this->orchard_id = $datos->altitude;
        //dd($datos);
        return $datos;
    }
}
