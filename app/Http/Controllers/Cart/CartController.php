<?php

namespace App\Http\Controllers\Cart;
use App\Http\Controllers\Controller;
use App\Helper\CartHelper;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
//    public $cart =[];
    public function view(CartHelper $cart)
    {
        return view('Customer.cart',compact('cart'));
    }

    public function add(CartHelper $cart,$id){
        $product = ProductsModel::find($id);
        $cart->add($product);
//        dd($cart);
        return redirect()->back();

    }
    public function remove(CartHelper $cart,$id){

        $cart->remove($id);
//        dd($cart);
        return redirect()->back();

    }
    public function update(CartHelper $cart,Request $request){

        if ($cart->update($request->id,$request->quantity)){
            return response()->json(array(
                'product' => $cart->items[$request->id],
                'total' => $cart->total_price
            ));
        }
    }
    public function clear(CartHelper $cart){

    $cart->clear();
    dd($cart);
    return redirect()->back();

}
}
