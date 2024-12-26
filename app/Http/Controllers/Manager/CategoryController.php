<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('menus')->paginate(10);
        return view('manager.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('manager.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->filled('is_active');

        Category::create($validated);

        return redirect()->route('manager.categories.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    public function edit(Category $category)
    {
        return view('manager.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->filled('is_active');

        $category->update($validated);

        return redirect()->route('manager.categories.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Category $category)
    {
        if ($category->menus()->count() > 0) {
            return back()->with('error', 'Cette catégorie contient des menus et ne peut pas être supprimée.');
        }

        $category->delete();

        return redirect()->route('manager.categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
}
