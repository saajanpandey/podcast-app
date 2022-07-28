<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PodcastListResource;
use App\Http\Resources\PodcastResource;
use App\Models\Favourites;
use App\Models\Play;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use PDO;
use Resposne;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $data = Favourites::where('user_id', $user_id)->pluck('podcast_id');
        $user = User::where('id', $user_id)->first();
        $podcasts = Podcast::where('status', 1)->with(['favourite' => function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        }])->with(['plays'])->latest()->get();
        return  PodcastResource::collection($podcasts);
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

    // public function download($id)
    // {
    //     $podcast = Podcast::find($id);
    //     if (!$podcast) {
    //         return response(['message' => 'Data Not Found!']);
    //     }
    //     $file = storage_path() . '/uploads/audios' . $podcast->audio;
    //     return response($file)->header('Content-Type', 'audio/mpeg');
    // }

    public function list()
    {
        $podcast = Podcast::count();
        return $podcast;
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $data = Podcast::where('title', 'ILIKE', $keyword)->get();
        if ($data->isEmpty()) {
            return response(['message' => 'Podcast Not Found!']);
        }
        return PodcastResource::collection($data);
    }

    public function plays(Request $request)
    {
        $user_id = auth()->user()->id;
        $podcast_id = $request->podcast_id;
        $play = new Play();
        $play->user_id = $user_id;
        $play->podcast_id = $podcast_id;
        $checkIds = Play::where('user_id', $user_id)->where('podcast_id', $podcast_id)->get();
        if ($checkIds->isEmpty()) {
            $play->save();
        } else {
            return null;
        }
    }

    public function listAll()
    {
        $podcasts = Podcast::where('status', 1)->orderBy('title', 'ASC')->get();
        return  PodcastListResource::collection($podcasts);
    }
}
