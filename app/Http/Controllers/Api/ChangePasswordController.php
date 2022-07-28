<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function store(ChangePasswordRequest $request)
    {
        $status = User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        if ($status) {
            return response(['message' => 'Password Changed Successfully', 'status' => 'ok']);
        } else {
            return response(['message' => 'Something Went Wrong!']);
        }
    }
}
