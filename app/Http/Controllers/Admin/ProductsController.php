<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd(ProductsModel::find(60)->GetCate->name);
        $item = ProductsModel::all();
        return view('admin.product.index', compact('item'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = CategoryModel::all();
        return view('admin.product.create', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if (ProductsModel::Createx($request)) {
            return redirect()->back()->with('mess', 'Thêm bài thành công');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = ProductsModel::find($id);

        return response()->json($view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductsModel::find($id);
        if($product != null){
            $cate = CategoryModel::all();
            return view('admin.product.edit', compact('product', 'cate'));
        }elseif ($product == null){
            abort(404,'NOT FOUND');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        if (ProductsModel::Updatex($request, $id)) {
            return redirect()->route('prod.list');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (ProductsModel::find($id)->delete()) {
            return json_encode(array('statusCode' => 200));
        }

    }
}
