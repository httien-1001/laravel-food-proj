<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    protected $table = 'oder_detail_models';
    protected $fillable = [
        'oder_id',
        'products_id',
        'quantity',
        'price'
    ];
    public function GetProducts(){
        return $this->hasMany(ProductsModel::class,'id','products_id'
        );
    }

}
