<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'oder_models';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'total_price',
        'voucher',
        'note',
        'addres',
        'user_id',
        'status',

    ];

    public function getDetail()
    {
        return $this->hasMany(OrderDetailModel::class, 'oder_id', 'id');
    }

    public function getStatus()
    {
        return $this->hasOne(TrackingModel::class, 'id', 'status');
    }

    public static function Updatex($request, $id)
    {
        if(OrderModel::where('id',$id)->update($request->only('name','email','phone','addres','note','status'))){
            return true;
        }
    }

}
