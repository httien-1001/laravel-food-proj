<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsModel;

class ReviewModels extends Model
{
    use HasFactory;
    protected $table='review';
    protected $fillable=['product_id','content'];

}
