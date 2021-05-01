<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;   
use Auth;

class HomeController extends Controller
{
    //

    public function viewProduct(int $user){

        return view('products', [ 'id'=>$user ]);

    }
    public function checkUser(){
        if (Auth::user()->user_type == 'Admin'){
            
            return view('admindash');
        }
        else{
            return view('dashboard');
        }
    }

}
