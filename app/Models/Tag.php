<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function posts(){
        return $this->belongsToMany(\App\Models\Post::class, 'post_tag');
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
