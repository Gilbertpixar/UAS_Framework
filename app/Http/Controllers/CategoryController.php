<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return View
     */
    public function index(): View
    {
        // Get categories
        $categories = Category::latest()->paginate(5);

        // Render view with categories
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Display the specified category.
     *
     * @param  string  $id
     * @return View
     */
    public function show(string $id): View
    {
        // Get category by ID
        $category = Category::findOrFail($id);

        // Render view with category
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  string  $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Get category by ID
        $category = Category::findOrFail($id);

        // Render view with category
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'image'   => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'title'   => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/categories', $image->hashName());

        // Create category
        Category::create([
            'image'   => $image->hashName(),
            'title'   => $request->title,
            'content' => $request->content
        ]);

        // Redirect to index
        return redirect()->route('dashboard.categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // Get category by ID
        $category = Category::findOrFail($id);

        // Delete image
        Storage::delete('public/categories/' . $category->image);

        // Delete category
        $category->delete();

        // Redirect to index
        return redirect()->route('dashboard.categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'image'   => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'title'   => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        // Get category by ID
        $category = Category::findOrFail($id);

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hashName());

            // Delete old image
            Storage::delete('public/categories/' . $category->image);

            // Update category with new image
            $category->update([
                'image'   => $image->hashName(),
                'title'   => $request->title,
                'content' => $request->content
            ]);
        } else {
            // Update category without image
            $category->update([
                'title'   => $request->title,
                'content' => $request->content
            ]);
        }

        // Redirect to index
        return redirect()->route('dashboard.categories.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
