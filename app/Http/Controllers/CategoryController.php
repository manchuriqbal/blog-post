<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index')->with([
            'categories' => Category::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create')->with([
            'categories' =>Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('categories', ['disk' => 'public']);
        }

        // $validatedData['slug'] = str($validatedData['name'])->slug();



        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show')->with([
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit')->with([
            'category' => $category,
            'categories' =>Category::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($category->thumbnail);
        }

        $validatedData['thumbnail'] = $request->file('thumbnail')->store('categories', 'public');

        // Generate slug if it's not set
        $validatedData['slug'] = $validatedData['slug'] ?? str($validatedData['name'])->slug();

        // Update the category with the validated data
        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category Updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    if ($category->thumbnail) {
        Storage::disk('public')->delete($category->thumbnail);
    }

    // Proceed with deleting the category
    $category->delete();

    return redirect()->route('categories.index')->with('warning', 'Category Deleted Successfully');
}

}
