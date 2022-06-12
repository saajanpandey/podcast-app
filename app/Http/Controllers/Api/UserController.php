<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Artist;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ImageTrait;
    public $imageDir = '/uploads/avatar';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return new UserResource($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        if ($request->hasFile('avatar')) {
            $user->avatar = $this->uploadImage($this->imageDir, $request->avatar);
        }
        $status = $user->save();
        if ($status) {
            return response(['message' => 'User Updated Successfully.', 'status' => 'ok']);
        } else {
            return response(['message' => 'User Not Found!']);
        }
    }

    // public function profileImage(Request $request)
    // {
    //     $user = User::find(auth()->user()->id);
    //     if ($request->hasFile('avatar')) {
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list()
    {
        $users = User::count();
        return $users;
    }

    public function artistList()
    {
        $artists = Artist::count();
        return $artists;
    }
}
