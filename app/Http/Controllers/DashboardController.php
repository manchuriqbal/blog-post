<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index')->with([
            'users' => User::where('role_id', 3)->get(),
            'posts' => Post::select('id')->get(),
            'authorsCount' => User::authors()->count(),
        ]);
    }



}
