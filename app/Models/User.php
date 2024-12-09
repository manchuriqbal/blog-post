<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'avatar',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(){
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }

    public function posts(){
        return $this->belongsToMany(\App\Models\Post::class, 'favorite_post');
    }

    public function comment(){
        return $this->hasMany(\App\Models\Comment::class, 'comment_id');
    }

    public function getAvatar(){
        if ($this->avatar == null) {
            return 'https://via.placeholder.com/100x100';
        }


        if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            return $this->avatar;
        }

        return Storage::url($this->avatar);

    }

    public function fullName(){
        return $this->first_name .' '. $this->last_name;
    }

    public function scopeAuthors($query)
    {
        return $query->whereIn('role_id', [1, 2]);
    }


}
