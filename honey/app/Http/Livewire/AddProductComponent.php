<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shade;
use Illuminate\Support\Facades\DB;
use Session;


class AddProductComponent extends Component
{
    public function render()
    {
        return view('livewire.add-product-component')->layout("layouts.admin");
    }

    public function saveNewProduct(Request $req){

        $data = $req->all();
        //echo "<pre>"; print_r($data); die;
        $product_info = new Product;
        $product_info->brand = $data['new_product_brand'];
        $product_info->description = $data['new_product_description'];
        $product_info->regular_price = $data['new_product_price'];
        $product_info->image_path =  "/"."storage"."/".$data['new_product_image'];
        $product_info->save();
        return redirect()->back();
    }
}
