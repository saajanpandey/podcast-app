<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeForm(Request $request)
    {
        return view('admin.changepassword');
    }

    public function store(ChangePasswordRequest $request)
    {
        Admin::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect()->route('login.form')->with('status', 'Password Change Successfully');
    }
}
