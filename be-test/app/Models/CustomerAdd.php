<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAdd extends Model
{
    use HasFactory;

    protected $table = "customer_address";
    protected $primarykey ="id";
    protected $fillable =[
        'customer_id', 'address'
    ];
}
