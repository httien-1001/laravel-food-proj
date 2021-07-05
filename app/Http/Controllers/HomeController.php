<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\OptionsModel;
use App\Models\ProductsModel;
use App\Helper\CartHelper;
use App\Models\ReviewModels;
class HomeController extends Controller
{

    public function Index()
    {
        $cate = CategoryModel::where('status', 1)->orderBy('created_at','desc')->get();
        $prod = ProductsModel::where('status', 1)->orderBy('created_at','desc')->get();
        $baminh = CategoryModel::where('id', 52)->orderBy('created_at','desc')->get();
        $com = CategoryModel::where('id', 51)->orderBy('created_at','desc')->get();
        $option = OptionsModel::find(1);
       return view('welcome', compact('cate', 'prod', 'option','baminh','com'));
    }

    public function Detail($id)
    {
        $pro = ProductsModel::find($id);
        $reviews=ProductsModel::find($id)->reviews;

//        dd($reviews);
        if ($pro != null) {
            $cat_id = $pro->cate_id;
            $cat = CategoryModel::find($cat_id)->GetProduct;


            return view('detail', compact('pro', 'cat','reviews'));
        }
        return abort(404);

    }
    public function Category($id)
    {
        $cate = CategoryModel::find($id);
        if ($cate != null) {
            $cat_id = $cate->id;
            $product = CategoryModel::find($cat_id)->GetProduct;
            return view('category', compact('cate', 'product'));
        } elseif ($cate == null) {
            return abort(404);
        }
    }

}
