<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavouriteRequest;
use App\Http\Resources\FavouriteResource;
use App\Http\Resources\PodcastResource;
use App\Models\Favourites;
use App\Models\Podcast;
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
    public function destroy(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $podcast_id = $request->podcast_id;
        $favourite = Favourites::where('user_id', $user_id)->where('podcast_id', $podcast_id)->get();
        $status = $favourite->delete();
        if ($status) {
            return response(['message' => 'Removed as favourite.', 'status' => 'ok']);
        } else {
            return response(['message' => 'Podcast Not Found!']);
        }
    }

    public function userFavourite()
    {
        $user_id = auth()->user()->id;
        $data = Favourites::where('user_id', $user_id)->pluck('podcast_id');
        $podcast = Podcast::whereIn('id', $data)->get();
        return PodcastResource::collection($podcast);
    }
}
