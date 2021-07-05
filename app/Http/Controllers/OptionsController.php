<?php

namespace App\Http\Controllers;

use App\Models\OptionsModel;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opti = OptionsModel::find(1);
        return view('admin.options.index', compact('opti'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public  function update(Request $request, $id)
    {
        if (OptionsModel::UpdateX($request, $id)) {
            return redirect()->back()->with('mess','Cập nhật thành công');
        }
    }


}
