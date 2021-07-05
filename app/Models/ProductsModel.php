<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table = 'products_models';
    protected $fillable = [
        'name',
        'img',
        'price',
        'des',
        'cate_id',
        'users_id',
        'sale_price',
        'status',
        'Flash_Sale',
        'Special'
    ];

    public static function Createx($request)
    {

        $request->merge(['users_id' => Auth::id()]);
        // insert data
        if (ProductsModel::create($request->only('name', 'price', 'img', 'des', 'cate_id', 'Flash_Sale', 'Special','sale_price',
            'users_id'))) {
            return true;
        }

    }

    public static function Updatex($request, $id)
    {

        $request->merge(['users_id' => Auth::id()]);

        if (ProductsModel::where('id', $id)->update($request->only('name', 'price', 'img', 'des', 'cate_id','sale_price',
            'Flash_Sale', 'Special','status',
            'users_id'))) {
            return true;
        }
    }

    public function GetCate()
    {
        return $this->belongsTo(CategoryModel::class, 'cate_id', 'id');
    }

    public function GetAuth()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }


    public  function reviews()
    {
        return $this->hasMany(ReviewModels::class,'product_id','id');
    }
}
