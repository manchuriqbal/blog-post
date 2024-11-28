<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author_id',
        'content',
        'thumbnail',
        'published_at',
        'status',
    ];

    public function author(){
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }

    public function postViews(){
        return $this->hasMany(\App\Models\PostView::class, 'post_id');
    }

    public function categories(){
        return $this->belongsToMany(\App\Models\Category::class, 'category_post');
    }

    public function tags(){
        return $this->belongsToMany(\App\Models\Tag::class, 'post_tag');
    }

    public function users(){
        return $this->belongsToMany(\App\Models\User::class, 'favorite_post');
    }
}
