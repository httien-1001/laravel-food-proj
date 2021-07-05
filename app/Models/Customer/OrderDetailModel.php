<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    protected $table = 'oder_detail_models';
    protected $fillable = [
        'oder_id',
        'price',
        'products_id',
        'quantity'
    ];
}
