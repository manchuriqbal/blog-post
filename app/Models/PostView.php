<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    /** @use HasFactory<\Database\Factories\PostViewFactory> */
    use HasFactory;

    protected $fillable = [
        'ip',
        'view_count',
        'post_id',
        'session_id',
    ];

    public function post(){
        return $this->belongsTo(\App\Models\Post::class, 'post_id');
    }
}
