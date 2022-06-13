<?php

namespace App\Http\Controllers;

use App\Http\Requests\PodcastRequest;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Podcast;
use App\Traits\AudioTrait;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use LaravelMP3;


class PodcastController extends Controller
{
    use ImageTrait;
    use AudioTrait;
    public $imageDir = '/uploads/images';
    public $audioDir = '/uploads/audios';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts = Podcast::paginate(10);
        return view('podcast.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::get();
        $categories = Category::get();
        return view('podcast.create', compact('artists', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PodcastRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($this->imageDir, $request->image);
        }
        if ($request->hasFile('audio')) {
            $data['audio'] = $this->uploadAudio($this->audioDir, $request->audio);
            $f1 = storage_path() . $this->audioDir . '/' . $data['audio'];
        }
        Podcast::create($data);
        return redirect()->route('podcasts.index')->with('create', 'Podcast Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $podcast = Podcast::find($id);
        return view('podcast.view', compact('podcast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $podcast = Podcast::find($id);
        $artists = Artist::get();
        $categories = Category::get();
        return view('podcast.edit', compact('podcast', 'artists', 'categories'));
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
        $data = $request->all();
        $podcast = Podcast::find($id);
        $podcast->title = $data['title'];
        $podcast->category_id = $data['category_id'];
        $podcast->artist_id = $data['artist_id'];
        $podcast->status = $data['status'];
        $podcast->save();
        return redirect()->route('podcasts.index')->with('update', 'Podcast Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $podcast = Podcast::find($id);
        if (!empty($podcast->image)) {
            $this->removeImage($this->imageDir, $podcast->image);
        }
        if (!empty($podcast->audio)) {
            $this->removeAudio($this->audioDir, $podcast->audio);
        }
        $podcast->delete();
        return redirect()->route('podcasts.index')->with('delete', 'Podcast Deleted Successfully !');
    }

    public function updateAudio(Request $request, $id)
    {
        $request->validate([
            'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        ]);
        $podcast = Podcast::find($id);
        if (!empty($podcast->audio)) {
            $this->removeAudio($this->audioDir, $podcast->audio);
            $podcast->audio = $this->uploadAudio($this->audioDir, $request->audio);
            $podcast->save();
            return redirect()->route('podcasts.index')->with('update', 'Audio Updated Successfully!');
        }
    }

    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $podcast = Podcast::find($id);
        if (!empty($podcast->image)) {
            $this->removeImage($this->imageDir, $podcast->image);
            $podcast->image = $this->uploadImage($this->imageDir, $request->image);
            $podcast->save();
            return redirect()->route('podcasts.index')->with('update', 'Image Updated Successfully!');
        }
    }
}
