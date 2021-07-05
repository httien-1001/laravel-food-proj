<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Customer.signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'address' => 'required',
            'phone' => 'required|string|min:10|unique:users',

        ],[
            'name.required' => 'Không để rỗng tên',
            'email.unique' => 'Email đã tồn tại',
            'email.required' => 'Không để rỗng Email',
            'password.required' => 'Không để rỗng Password',
            'password.min' => 'Nhập lớn hơn 8 kí tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'phone.required' => 'Không để rỗng Phone',
            'phone.unique' => 'Số điện thoại đã tồn tại',

        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'Address' => $request->address,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
