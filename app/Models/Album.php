<?php

namespace PhotoGallery\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = ['name', 'description', 'cover_image'];

    public function Photos()
    {
        return $this->hasMany('PhotoGallery\Models\Image', 'album_id');
    }
}
