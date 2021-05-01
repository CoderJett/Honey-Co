<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class AdminComponent extends Component
{
    public function render()
    {
        $user = Auth::user();

        return view('livewire.admin-component',['user'=>$user])->layout("layouts.admin");
    }
}
