<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Categories
        $categories = Category::where('active', true)
            ->latest()
            ->paginate(10);

        return view('usersite.categories.index')->with([
            'categories' => $categories,
        ]);
    }

    public function show(Category $category)
    {
        return view('usersite.categories.show')->with([
            'category' => $category,
        ]);
    }
}
