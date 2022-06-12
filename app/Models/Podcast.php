<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'category_id', 'artist_id', 'image', 'audio'];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
