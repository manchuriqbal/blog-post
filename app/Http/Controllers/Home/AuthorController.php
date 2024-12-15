<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::whereIn('role_id', [1, 2])
            ->orderBy('role_id', 'desc')
            ->get();

        return view('usersite.author.index')->with([
            'authors' => $authors,
        ]);
    }

    public function view(User $user)
    {
        return view('usersite.author.view')->with([
            'author' => $user,
        ]);
    }
}
