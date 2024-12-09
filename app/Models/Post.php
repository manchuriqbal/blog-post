<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id', 'thumbnail', 'slug'];


    public function author(){
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }

    public function postViews(){
        return $this->hasMany(\App\Models\PostView::class, 'post_id');
    }
    public function comment(){
        return $this->hasMany(\App\Models\Comment::class, 'post_id');
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

    public function getThumbnail(){
        if ($this->thumbnail == null) {
            return 'https://via.placeholder.com/100x100';
        }


        if (filter_var($this->thumbnail, FILTER_VALIDATE_URL)) {
            return $this->thumbnail;
        }

        return Storage::url($this->thumbnail);

    }

    protected static function booted()
    {
        static::saving(function ($post) {
            if ($post->status == 'published' && !$post->published_at) {
                $post->published_at = now();
            }
        });
    }
}
