<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['message' => 'Please provide correct credentials.'], 401);
        }
        $randomText =  hash_hmac('sha256', Str::random(40), config('app.key'));
        $token = $user->createToken($randomText)->plainTextToken;
        return new TokenResource($token);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user) {
            $randomText =  hash_hmac('sha256', Str::random(40), config('app.key'));
            $token = $user->createToken($randomText)->plainTextToken;
            return new TokenResource($token);
        } else {
            return response(['message' => 'No Data Created!']);
        }
    }

    public function logout()
    {
        if (!auth()->check())
            return response(['Status' => "ERROR", "response" => "No logged in user found"]);
        else {
            $user = auth()->user();
            auth()->guard('web')->logout();
            $user->tokens->each(function ($tkn) {
                $tkn->delete();
            });
            return response(['message' => "User Logged out successfully"])->setStatusCode(200);
        }
    }
}
