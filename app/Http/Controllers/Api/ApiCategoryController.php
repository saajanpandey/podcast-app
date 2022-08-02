<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryWithPodcastResource;
use App\Http\Resources\PodcastListResource;
use App\Http\Resources\PodcastResource;
use App\Models\Category;
use App\Models\Podcast;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function podcastList(Request $request)
    {
        $categoryId = $request->category_id;
        $list = Category::where('id', $categoryId)->with(['podcasts'])->get();
        $plist = $list->pluck('podcasts');
        foreach ($plist as $p) {
            return PodcastListResource::collection($p);
        }
    }
}
