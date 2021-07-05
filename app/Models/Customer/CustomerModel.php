<?php

namespace App\Models\Customer;

use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;

    public static function UpdateProfile($request, $id)
    {
        $avata = User::find($id)->avata;
        if ($request->hasFile('anh') != null) {
            $file = $request->file('anh');
            $avata = '/images/' . $request->file('anh')->getClientOriginalName();
            $file->move('images', $file->getClientOriginalName());
        }
        $request->merge(['avata' => $avata]);
        if (User::where('id', $id)->update($request->only('name', 'avata', 'email', 'phone', 'Address'))) {
                return true;
        }


    }

    public static function Changepass($request, $id)
    {
        if (!\Hash::check($request->oldpass, auth()->user()->password)) {
            return false;
        } else {
            if (User::find($id)->update([
                'password' => \Hash::make($request->pass)
            ])) {
                return true;
            }
        }
    }
}
