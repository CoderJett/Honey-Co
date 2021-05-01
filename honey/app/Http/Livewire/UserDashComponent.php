<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Shade;
use App\Models\CartTable;
use App\Models\User;
use App\Models\Cart;
use App\Models\CheckoutDetail;




class UserDashComponent extends Component
{
    public function delete(User $id){   
        
        $id->delete();

    }
    public function render()
    {
        $users = User::all(); 
        return view('livewire.user-dash-component', ['users'=>$users])->layout("layouts.admin");

        
    }
}
