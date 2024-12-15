<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('usersite.partial.sidebar', function ($view) {
            $recentpost = Post::orderBy('created_at', 'desc')->take(5)->get();
            $view->with('recentpost', $recentpost);
        });
    }
}
