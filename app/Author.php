<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable=['name','email','about', 'image'];
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function relPost(){
        return $this->hasMany('App\Post');
    }
}
