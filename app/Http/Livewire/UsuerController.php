<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsuerController extends Component
{
    public $Usuario, $user_id, $username, $email, $profile_photo_path;
    public $idDialogOpen = 0;
    public function render()
    {
        $this->Usuario = User::all();
        return view('livewire.users.usuer-controller');
    }

    private function resetCreateForm(){
        $this->username = '';
    }

    public function store()
    {
        $this->validate([

            'name' => 'required',
            'email' => 'required'
        ]);

        //$this->profile_photo_path=$this->profile_photo_path->store('users','images', 'public');

        User::updateOrCreate(['id' => $this->user_id], [

            'name' => $this->username,
            'email' => $this->email,
        ]);

        session()->flash('message', $this->user_id ? '------!' : '---!');
        $this->resetCreateForm();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Usuario eliminado!');
    }
}
