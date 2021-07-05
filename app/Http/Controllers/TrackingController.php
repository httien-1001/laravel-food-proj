<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Auth;
use Illuminate\Http\Request;

//use App\Models\Customer\OrderDetailModel;


class TrackingController extends Controller
{
    public function show()
    {
        $id = Auth::id();
        $orders = OrderModel::where('user_id', $id)->orderBy('created_at','DESC')->paginate(10);
        if (count($orders) > 0) {
            return view('Customer.tracking', compact('orders'));
        } else {
            return view('errors.tracking');

        }

    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::id();

        $customer = OrderModel::where([
            ['id', $id],
            ['user_id',$user_id]
        ])->get();
        if(!empty($customer[0])){
            return view('Customer.tracking-detail', compact('customer'));
        }else{
            return view('errors.tracking');
        }


//        dd($order_details);
    }
}
