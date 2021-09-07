<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
      'category_id',
      'author_id',
      'title',
      'content',
        'status',
      'published_at',
      'image',
      'is_featured'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function scopePublished($query){
       return $query->where('status', 'published');
    }
}
