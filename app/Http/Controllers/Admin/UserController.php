<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RolesModel;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::all();
        return view('admin.user.index', compact('user'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::find($id);
        $role = RolesModel::all();
        return view('admin.user.edit', compact('edit', 'role'));
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
        $request->validate([
           'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|string|min:10',
        ]);
        $avata = User::find($id)->avata;
        if($request->hasFile('avata')){
            $file = $request->file('avata');
            $avata = '/images/' . $request->file('avata')->getClientOriginalName();
            $file->move('images', $file->getClientOriginalName());
        }
        User::where('id', $id)->update([
            'name' => $request->name,
            'avata' => $avata,
            'email' => $request->email,
            'phone' => $request->phone,
            'Address' => $request->address,
            'roles_models_id'=> $request->quyen,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete()){
            return json_encode(array('statusCode' => 200));
        }
    }
}
