<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Product;
use App\Models\Shade;
use App\Models\CartTable;
use App\Models\User;
use App\Models\Cart;
use App\Models\CheckoutDetail;
use Illuminate\Support\Facades\DB;
use Session;

class ProductDashComponent extends Component
{
    public function disable(Product $id){   
        
        $id->is_active = 0;
        DB::update("update shades set is_active = 0 where shade_id = :id", ['id' => $id->id]);
        $id->save();

    }

    public function enable(Product $id){   
        
        $id->is_active = 1;
        DB::update("update shades set is_active = 1 where shade_id = :id", ['id' => $id->id]);
        $id->save();

    }

    public function increment(Shade $id){
        
        $id->quantity = $id->quantity + 1;
        $id->save();

    }

    public function addnewshade(Request $request){
        
        $data = $request->all();
        $shade = new Shade;
        $shade->shade_id = $data['product_id'];
        $shade->shade_name = $data['new_shade_name'];
        $shade->quantity = 1;
        $shade->stock_status = 'instock';
        $shade->save();
        return redirect()->back();

    }

    public function decrement(Shade $id){
        
        if($id->quantity==1){

            $id->delete();
            return redirect()->back();

        }else{

            $id->quantity = $id->quantity - 1;
            $id->save();


        }

    }

    public function editProduct(Product $id){
        return view('livewire.edit-product-component',['product' => $id])->layout("layouts.admin");
    }



    public function render()
    {
        // $productsKR = DB::select('select * from products where id = 1');
        // $shadesKR = DB::select('select * from shades where shade_id = 1');
        // $productsHS = DB::select('select * from products where id = 2');
        // $shadesHS = DB::select('select * from shades where shade_id = 2');

        $products = Product::all();
        $shades = Shade::all();
        
    //     return view('livewire.product-dash-component',[
    //         'productsKR'=>$productsKR, 'shadesKR'=>$shadesKR,
    //         'productsHS'=>$productsHS, 'shadesHS'=>$shadesHS, 
    //         ])->layout("layouts.admin");
    // }

    return view('livewire.product-dash-component',[
        'products' => $products, 'shades'=> $shades
        ])->layout("layouts.admin");
}
}
