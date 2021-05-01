<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Shade;
use App\Models\CartTable;
use App\Models\User;
use App\Models\Cart;
use App\Models\CheckoutDetail;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class OrderDashComponent extends Component
{


    public function flashOR(Cart $cart_id){


        $result = CartTable::find($cart_id->id);
        $result = DB::select("SELECT cart_id, GROUP_CONCAT(brand, '   ') as brand FROM (select c.cart_id, CONCAT(p.brand, ' - ', c.shade, ' X ', CONVERT(c.quantity, CHAR), ' ') as brand FROM cart_tables c JOIN products p ON c.product_id = p.id ) c WHERE c.cart_id = :cid GROUP BY c.cart_id;",['cid' => $cart_id->id]);
        //$to_show = $result->implode('product_id', ', ');
        Session::flash('order_items', $result[0]->brand);


    }


    public function forDelivery(Cart $id){
        $id = CheckoutDetail::where(['cart_id'=>$id->id])->first();
        //$id = CheckoutDetail::where(['cart_id'=>$id->id]);
        // $result = DB::select("SELECT * FROM checkout_details where cart_id = :cid",['cid' => $id->id]);
        // $id = CheckoutDetail::find($result[0]->id);
        $id->delivery_status = 'To be delivered';
        if ($id->method ==  'COD'){
            $id->payment_status =  'Not Yet Paid';
        }
        if ($id->method !=  'COD'){
            $id->payment_status =  'Paid';
            $id->payment = $id->total_amount;
        }
        
        $id->save();
    }
    public function Delivered(Cart $id){

        $id = CheckoutDetail::where(['cart_id'=>$id->id])->first();
        if ($id->method ==  'COD'){
            $id->payment_status =  'Paid';
            $id->payment = $id->total_amount;
        }
        $id->delivery_status =  'Delivered';
        $id->save();


    }
    public function CancelOrder(Cart $id){

        $can_be_deleted = CheckoutDetail::where(['cart_id'=>$id->id, 'payment_status'=>'Not Yet Paid'])->count();
        if ($can_be_deleted){
            $cod_result = CheckoutDetail::where(['cart_id'=>$id->id, 'payment_status'=>'Not Yet Paid']);
            $cod_result->delete();
            $ct_result = CartTable::where(['cart_id'=>$id->id]);
            $ct_result->delete();
            $id->delete();
        }else{
            $flash_message='Paid orders cannot be deleted';
            Session::flash('flash_items', $flash_message);
            return redirect()->back();
        }
        

    }


    public function render()
    {

        $all_in = DB::select('SELECT 
        c.id,
        c.user_id,
        LPAD(cod.id,6,0) AS or_number,
        cod.method,
        cod.total_amount,
        cod.payment_status,
        cod.delivery_status,
        cod.payment	
        FROM
        checkout_details cod
        JOIN carts c ON cod.cart_id = c.id;');

        return view('livewire.order-dash-component',['all_in'=>$all_in])->layout("layouts.admin");

    }
}
