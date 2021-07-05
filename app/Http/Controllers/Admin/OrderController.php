<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\TrackingModel;
use Illuminate\Http\Request;
use App\Models\OrderDetailModel;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oder = OrderModel::all();
        return view('admin.order.index', compact('oder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Order = OrderModel::find($id);
        $id = OrderModel::find($id)->getDetail;

        return view('admin.order.view', compact('Order', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = OrderModel::find($id);
        $track = TrackingModel::all();

        if ($order != null) {
            return view('admin.order.edit', compact('order', 'track'));
        } elseif ($order == null) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (OrderModel::Updatex($request, $id)) {
            return redirect()->back()->with('mess', 'Sửa thành công');
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
        if (OrderDetailModel::where('oder_id', $id)->delete()) {
            if (OrderModel::find($id)->delete()) {
                return json_encode(array('statusCode' => 200));

            }

        }
    }

    public function PDF($id)
    {
        $Order = OrderModel::find($id);
        $id = OrderModel::find($id)->getDetail;
        $data = [
            'order' => $Order,
            'id' => $id
        ];
        $pdf = PDF::loadView('pdf.document', $data);
        return $pdf->stream('document.pdf');
    }
}
