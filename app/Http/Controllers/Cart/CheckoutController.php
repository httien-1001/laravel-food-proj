<?php

namespace App\Http\Controllers\Cart;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Customer\OrderDetailModel;
use App\Models\Customer\OrderModel;
use Auth;
use App\Models\VoucherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function view(CartHelper $cart)
    {


//        return  $cart;
        return view('Customer.checkout', compact('cart'));
    }
//    public function success(){
//        return view('Customer.successful');
//    }
    public function check_voucher(Request $request){
        $request->validate([
           'name' => 'required|exists:voucher_models'
        ],[
            'name.required' => 'Vui lòng không để rỗng',
            'name.exists' => 'Mã không tồn tại hoặc hết hạn'

        ]);
            $data= $request->name;
            $check = VoucherModel::checkVoucher($data);

            if(!empty($check)){
                session(['voucher' => $check]);
                return redirect()->back();
            }

    }
    public function submit_form(CartHelper $cart, CheckoutRequest $request)
    {
        //xu li don hang
        $customer_id = Auth::user()->id;
//        if()
//        dd($request->voucher);
        $voucher = $request->voucher;
        $order = OrderModel::create([
            'user_id' => $customer_id,
            'note' => $request->order_note,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'addres' => $request->addres,
            'voucher' => $voucher,
            'total_price' => $request->total_price > 0 ? $request->total_price : 0,

        ]);
//        dd( $request->total_price);
        if ($order) {
            $order_id = $order->id;
            foreach ($cart->items as $product_id => $item) {
                $quantity = $item['quantity'];
                $price = $item['price'];
                OrderDetailModel::create([
                    'oder_id' => $order_id,
                    'products_id' => $product_id,
                    'price' => $price,
                    'quantity' => $quantity,
                ]);
            }
            $cart->clear();
            session(['voucher' => null]);
            $Order = \App\Models\OrderModel::find($order_id);
            $id = \App\Models\OrderModel::find($order_id)->getDetail;
            $details = [
                'id' => $Order->id,
                'name' => $Order->name,
                'email' => $Order->email,
                'phone' => $Order->phone,
                'total_price' => $Order->total_price,
                'voucher' => $Order->voucher,
                'addres' => $Order->addres,
                'note' => $Order->note,
                'product' => $id
            ];
            $email = $Order->email;
            Mail::to($email)->send(new \App\Mail\Gmail($details));
            return redirect()->route('cart.success');
        }
        return abort(404);
    }

    public function Success()
    {
        return view('Customer.successful');

    }

}
