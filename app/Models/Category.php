<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'categories',
        'name',
        'slug',
        'thumbnail',
        'active',
        'parent_id',
    ];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function posts(){
        return $this->belongsToMany(\App\Models\Post::class, 'category_post');
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
}
