<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;


class CartTable extends Model
{
    use HasFactory;

    protected $table='cart_tables';

    protected $primaryKey='id';

    protected $fillable = ['user_id', 'product_id', 'shade', 'quantity'];

    public static function userCartItems(){

        if(Auth::check()){

            $userCartItems = CartTable::with('product')->where('user_id', Auth::user()->id)->get()->toArray();

        }else{

            return view('login');
        }

        return $userCartItems;

    }
    

    public function product(){
        
        return $this->belongsTo(Product::class);
    }
}
