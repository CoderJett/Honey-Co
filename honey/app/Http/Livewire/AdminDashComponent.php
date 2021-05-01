<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminDashComponent extends Component
{
    public function render()
    {
        return view('livewire.admin-dash-component')->layout("layouts.admin");
    }
}
