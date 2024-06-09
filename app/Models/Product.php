<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'unitPrice',

    ];
    public function orders(){
        return  $this->belongsToMany(Order::class,'order_details','product_id','order_id');
        }
}
