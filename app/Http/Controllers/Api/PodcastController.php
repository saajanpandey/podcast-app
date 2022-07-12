<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PodcastResource;
use App\Models\Podcast;
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
        $podcasts = Podcast::where('status', 1)->latest()->get();
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
}
