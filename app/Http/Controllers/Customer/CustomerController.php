<?php

namespace App\Http\Controllers\Customer;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\UpdateResquest;
use App\Models\Customer\CustomerModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Validator;

class CustomerController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function Profile()
    {
        return view('Customer.profile');
    }

    public function forget()
    {
        return view('Customer.forget');
    }

    public function UpdateProfile(UpdateResquest $request, $id)
    {
        if (CustomerModel::UpdateProfile($request, $id)) {
            return redirect()->back();
        }


    }

    public function ChangePass(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'oldpass' => 'required',
            'pass' => 'required|string|min:8',
        ]);
        if ($validator->passes()) {
            if (CustomerModel::Changepass($request, $id)) {
                return json_encode(array('statusCode' => 200));
            }else{
                return json_encode(array('statusCode' => 404));
            }
        }
        return json_encode(['error'=>$validator->errors()->all()]);
    }

    public function Addcart(Cart $cart, $id)
    {
        $data = ProductsModel::find($id);
        return $cart->Add($data);
    }


}
