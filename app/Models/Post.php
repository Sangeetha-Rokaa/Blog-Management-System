<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class Post extends Model
{
    protected $guarded = [];

    public function category() { return $this->belongsTo(Category::class); }
    public function comments() { return $this->hasMany(Comment::class); }
    public function likes() { return $this->hasMany(Like::class); }
    public function downloads() { return $this->hasMany(Download::class); }
    public function shares() { return $this->hasMany(Share::class); }
}


