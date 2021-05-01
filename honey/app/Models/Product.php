<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $primaryKey='id';

    protected $fillable = ['brand', 'regular_price', 'sale_price', 'image_path'];

    protected $is_active='is_active'; //1 = active, 0 = inactive

    public function shade(){

        return $this->hasMany(Shade::class);
    }
}
