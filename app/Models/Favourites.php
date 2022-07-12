<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'podcast_id'];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'id', 'podcast_id');
    }
}
