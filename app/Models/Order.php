<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'total',
        'customer_id',

    ];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public function customers(){
            return $this->belongsTo(User::class,'customer_id');
        }

    public function products(){
        return  $this->belongsToMany(Product::class,'order_details','order_id','product_id');
        }

}
