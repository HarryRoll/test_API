<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $primarykey ="id";
    protected $fillable =[
        'id_product', 'id_payment_method', 'id_customer'
    ];
}
