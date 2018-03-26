<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title', 'photo'];

    public function blog()
    {
        $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(Photo::class);
    }
}
