<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavouriteRequest;
use App\Models\Favourites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavouriteRequest $request)
    {
        $user_id = auth()->user()->id;
        $podcast_id = $request->podcast_id;
        $favourite = new Favourites();
        $favourite->user_id = $user_id;
        $favourite->podcast_id = $podcast_id;
        $status = $favourite->save();
        if ($status) {
            return response(['message' => 'Marked as favourite.', 'status' => 'ok']);
        } else {
            return response(['message' => 'Podcast Not Found!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

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

    public function userFavourite()
    {
        $user_id = auth()->user()->id;
        $data = Favourites::where('user_id', $user_id)->get();
        return $data;
    }
}
