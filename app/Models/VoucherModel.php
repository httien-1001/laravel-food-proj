<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherModel extends Model
{
    use HasFactory;

    protected $table = 'voucher_models';
    protected $fillable = ['name', 'discount_price', 'create_by'];

    public static function checkVoucher($data)
    {

        $vouchers = VoucherModel::all();
        foreach ($vouchers as $voucher) {
            if ($data == $voucher->name) {
                $voucher_discount = $voucher->discount_price;
            } else {
                $voucher_discount = 0;
            }
        };

        return $voucher_discount;
    }
}
