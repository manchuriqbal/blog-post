<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category_view')->with([
            'categories' => Category::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category_create')->with([
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

        return redirect()->route('category.index')->with('success', 'Category Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category_details')->with([
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category_edit')->with([
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
            // Delete the old thumbnail if it exists
            if ($category->thumbnail) {
                $oldThumbnailPath = public_path('storage/' . $category->thumbnail); // Ensure we use the correct public path

                // Check if the file exists before attempting to delete it
                if (file_exists($oldThumbnailPath)) {
                    // Log the old file path for debugging
                    Log::info('Deleting old thumbnail: ' . $oldThumbnailPath);

                    // Attempt to delete the file
                    try {
                        unlink($oldThumbnailPath);
                        Log::info('Old thumbnail deleted successfully.');
                    } catch (\Exception $e) {
                        // Log the error if unlink fails
                        Log::error('Failed to delete old thumbnail: ' . $e->getMessage());
                    }
                } else {
                    // Log a warning if the old file does not exist
                    Log::warning('Old thumbnail not found: ' . $oldThumbnailPath);
                }
            }

            // Store the new thumbnail and update the path in the validated data
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('categories', ['disk' => 'public']);
        }

        // Generate slug if it's not set
        $validatedData['slug'] = $validatedData['slug'] ?? str($validatedData['name'])->slug();

        // Update the category with the validated data
        $category->update($validatedData);

        return redirect()->route('category.index')->with('success', 'Category Updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    // Check if the category has a thumbnail and if the file exists in the public directory
    if ($category->thumbnail) {
        $oldThumbnailPath = public_path('storage/' . $category->thumbnail); // Correct path handling

        // Check if the file exists before attempting to delete it
        if (file_exists($oldThumbnailPath)) {
            try {
                unlink($oldThumbnailPath);
                Log::info('Deleted thumbnail: ' . $oldThumbnailPath);  // Log successful deletion
            } catch (\Exception $e) {
                Log::error('Error deleting thumbnail: ' . $e->getMessage());  // Log error if deletion fails
            }
        } else {
            Log::warning('Thumbnail not found for deletion: ' . $oldThumbnailPath);  // Log if file doesn't exist
        }
    }

    // Proceed with deleting the category
    $category->delete();

    return redirect()->route('category.index')->with('warning', 'Category Deleted Successfully');
}

}
