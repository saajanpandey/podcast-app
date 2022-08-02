<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title','image'];

    public function podcasts()
    {
        return $this->belongsToMany(Podcast::class, 'podcast_categories', 'category_id', 'podcast_id');
    }
}
