<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shade;
use Illuminate\Support\Facades\DB;
use Session;

class EditProductComponent extends Component
{
    public function edit(int $id)
    {
        $product = DB::select(DB::raw("SELECT * FROM products WHERE id = $id;"));  
        //echo "<pre>"; print_r($product); die;
        return view('livewire.edit-product-component', [
            'product'=> $product
        ])->layout("layouts.admin");

    }

    public function update(Request $req){

        $data = $req->all();
        //echo "<pre>"; print_r($data); die;
        $id = $data['prod_id'];
        $product_info = Product::find($id);
        $product_info->brand = $data['new_product_brand'];
        $product_info->description = $data['new_product_description'];
        $product_info->regular_price = $data['new_product_price'];
        $product_info->image_path =  "/"."storage"."/".$data['new_product_image'];
        $product_info->save();
        return redirect()->back();
        //$product = DB::select(DB::raw("SELECT * FROM products WHERE id = $id;")); 
        
    }
}
