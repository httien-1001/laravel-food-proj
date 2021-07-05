<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category_models';
    protected $fillable = [
        'name',
        'img',
        'users_id'
    ];

    public static function edit($id)
    {
        return CategoryModel::find($id);
    }

    public static function updateX($data, $id)
    {
        $data->merge(['users_id' => Auth::id()]);

        // update
        if (CategoryModel::where('id', $id)->update($data->only('name', 'img', 'status'))) {
            return true;
        }

    }

    public static function Create($data)
    {

        $data->merge(['users_id' => Auth::id()]);
        // insert data -> sql
        if (CategoryModel::insert($data->only('name', 'img', 'users_id'))) {
            return true;
        }

    }

    public function GetProduct()
    {
        return $this->hasMany(ProductsModel::class, 'cate_id');
    }
}
