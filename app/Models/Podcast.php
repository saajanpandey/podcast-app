<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'artist_id', 'image', 'audio'];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }
    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id', 'id');
    // }
    public function favourite()
    {
        return $this->hasMany(Favourites::class, 'podcast_id', 'id');
    }
    public function plays()
    {
        return $this->hasMany(Play::class, 'podcast_id', 'id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'podcast_categories', 'podcast_id', 'category_id');
    }
}
