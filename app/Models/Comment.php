<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'comment',
        'post_id',
        'user_id',
        'comment_id',
    ];

    public function children()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }


    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
