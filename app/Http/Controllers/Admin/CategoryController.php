<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreResquest;
use App\Http\Requests\Category\UpdateResquest;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = CategoryModel::all();
        return view('admin.index', compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AddCate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResquest $request)
    {
        if (CategoryModel::Create($request)) {
            return redirect()->route('cate.create')->with('mess', 'Thêm thành công');
        } else {
            return redirect()->route('cate.create')->with('err', 'Danh mục đã tồn tại');
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
        $view = CategoryModel::find($id);
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
        $edit = CategoryModel::edit($id);
        return view('admin.EditCate', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResquest $request, $id)
    {
        if (CategoryModel::updateX($request, $id)) {
            return redirect()->route('cate.list');
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
        $post = CategoryModel::find($id)->GetProduct;
        if (count($post) == 0) {
            CategoryModel::find($id)->delete();
            return json_encode(array('statusCode' => 200));
        } else {
            return json_encode(array('statusCode' => 401, 'count' => count($post)));
        }


    }
}
