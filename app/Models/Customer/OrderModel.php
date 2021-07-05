<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'oder_models';
    protected $fillable = [
        'name',
        'email',
        'addres',
        'phone','note','status','user_id','total_price',
        'voucher',
    ];
}
