<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials, $remember_me)) {
            Admin::where('email', $request->email)->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->intended('/system/dashboard');
        }
        return redirect()->route('login.form')->with('status', 'Please provide correct credentials!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('status', 'Logout Successfully!');;
    }
}
