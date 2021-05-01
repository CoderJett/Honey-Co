<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shade extends Model
{
    use HasFactory;

    protected $table = 'shades';

    protected $primaryKey = 'id';

    protected $fillable = ['shade_name', 'stock_status', 'quantity'];

    protected $is_active='is_active'; //1 = active, 0 = inactive

    public function product(){
        
        return $this->belongsTo(Product::class,);
    }
}
