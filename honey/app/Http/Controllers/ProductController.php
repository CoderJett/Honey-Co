<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shade;
use App\Models\CartTable;
use App\Models\User;
use App\Models\Cart;
use App\Models\CheckoutDetail;
use Illuminate\Support\Facades\DB;
use Session;


class ProductController extends Controller
{

    public function addToCart(Request $request) {

        if($request->isMethod('post')){
            $data = $request->all();
            $user_id = $data['user_id'];
            //echo "<pre>"; print_r($data); die;
            $existing_cart = Cart::where(['user_id'=>$user_id,'is_checkout'=>0]);
            $main_cart_count = $existing_cart->count();
            if($main_cart_count<1){
                $new_main_cart = new Cart;
                $new_main_cart->user_id = $user_id;
                $new_main_cart->is_checkout = 0;
                $new_main_cart->save();
                //$existing_cart = Cart::where(['user_id'=>$user_id,'is_checkout'=>0]);
            }

            $main_cart= DB::select(DB::raw("select id, user_id from carts where user_id = $user_id AND is_checkout = 0 limit 1"));

            $countProducts = CartTable::where(['user_id'=>$user_id,'product_id'=>$data['product_id'],
            'shade'=>$data['shade'],'isDeleted'=>0, 'cart_id' => $main_cart[0]->id])->count();
            if($countProducts>0){
                $message = "Product already exist in Cart!";
                Session::flash('error_message', $message);
                return redirect()->back();
            }

            
            //Cart::where(['user_id'=>$user_id,'is_checkout'=>0]);

            $cart = new CartTable;
            $cart->cart_id = $main_cart[0]->id;
            $cart->user_id = $user_id;
            $cart->product_id =$data['product_id'];
            $cart->shade =$data['shade'];
            $cart->quantity =$data['quantity'];
            $cart->save();

            

            // CartTable::insert(['user_id'=>$user_id=1,'product_id'=>$data['product_id'],'shade'=>$data['shade'],'quantity'=>$data['quantity']]);
            $message = "Product has been added in Cart!";
            Session::flash('success_message', $message );
            return redirect()->back();
        }

    }

    public function destroy(CartTable $cart_id){   
        
        $user_id = $cart_id->user_id;
        $cart_id->delete();
        return redirect()->route('cart', $user_id);

    }

    public function increment(CartTable $cart_id){
        
        $cart_id->quantity = $cart_id->quantity + 1;
        $cart_id->save();
        return redirect()->back();
        // return redirect()->route('cart');
    }

    public function decrement(CartTable $cart_id){
        
        if($cart_id->quantity==1){
            $user_id = $cart_id->user_id;
            $cart_id->delete();
            return redirect()->route('cart', $user_id);

        }else{

            $cart_id->quantity = $cart_id->quantity - 1;
            $cart_id->save();
            return redirect()->back();

        }

       
    }
    public function Viewcart(int $id){
  
        $userCartItems = DB::select(DB::raw("SELECT ct.*, p.regular_price, p.brand, p.image_path, p.is_active, 'GCASH' AS method FROM carts c join cart_tables ct on c.id = ct.cart_id join products p on p.id = ct.product_id WHERE c.is_checkout = 0 AND c.user_id = $id;"));            //CartTable::userCartItems();
        $method = 'GCASH'; 
        // echo "<pre>"; print_r($userCartItems); die;
        return view('cart', ['userCartItems'=> $userCartItems, 'method'=> $method, 'id'=> $id]);
        
    }

    public function addToCheckout(Request $request) {

        $data = $request->all();
        $method = $data['method'];
        $id = $data['user_id'];

        $result = DB::select(DB::raw("select c.id as cart_id, SUM(p.regular_price*cc.quantity) AS total_amount from carts c JOIN cart_tables cc ON c.id = cc.cart_id join products p ON cc.product_id = p.id WHERE c.user_id = $id AND c.is_checkout = 0 group by c.id")); 
        // $message = "Checkout has been successful!";
        // Session::flash('success_message', var_dump($result) );
        // Session::flash('success_message', $result[0]->total_amount);
        if ($result != null){

            $cart_id = $result[0]->cart_id;
            $counter_dup = CheckoutDetail::where(['cart_id'=>$cart_id, 'total_amount'=> $result[0]->total_amount + 100, 'delivery_status' => 'Pending', 'payment_status'=> 'Not Yet Paid'])->count();
            if ($counter_dup == 0){
                $co_detail = new CheckoutDetail;
                $co_detail->cart_id = $cart_id;
                $co_detail->method = $method;
                $co_detail->payment = NULL;
                $co_detail->total_amount = $result[0]->total_amount + 100; //100 is for delivery fee
                $co_detail->payment_status = 'Not Yet Paid';
                $co_detail->delivery_status = 'Pending';
                $co_detail->save();
            }
            
                $user = DB::select(DB::raw("select * from users where id =$id"));
            
                //$methods = array("GCASH", "COD", "BANK");

                return view('checkout', [
                    'user' => $user,
                    'id' => $cart_id,
                    'method'=> $method
                ]);
        }

        return redirect()->back();

    }

    public function submitOrder(Cart $id) {

        $id->is_checkout = 1;
        $id->save();
        //CheckoutDetail::where(['cart_id'=>$id->id]);
        // $detail->method = 'COD';
        // $detail->payment_status = 'Paid';
        // $detail->save();

        // CartTable::insert(['user_id'=>$user_id=1,'product_id'=>$data['product_id'],'shade'=>$data['shade'],'quantity'=>$data['quantity']]);
        
        $message = "Order has been successful!";
        Session::flash('success_message', $id);
        return redirect()->route('received');

    }


    public function Keyring(int $user){

        
        //SELECT FROM PRODUCTS AND SHADE
        $products = DB::select('select * from products where id = 1 and is_active = 1');
        $shades = DB::select('select * from shades where shade_id = 1 and is_active = 1');
        
        return view('keyring-details', [

            'products' =>$products,
            'shades' =>$shades,
            'id'=>$user

        ]);
        
    }

    public function Highshine(int $user){

        //SELECT FROM PRODUCTS AND SHADE
        $products = DB::select('select * from products where id = 2 and is_active = 1');
        $shades = DB::select('select * from shades where shade_id = 2 and is_active = 1');

        return view('highshine-details', [

            'products' => $products,
            'shades' =>$shades,
            'id'=>$user

        ]);

    }

}
