<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->paginate(10);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->filled('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menus', 'public');
            $validated['image_path'] = $path;
        }

        Menu::create($validated);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu créé avec succès.');
    }

    public function edit(Menu $menu)
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($menu->image_path) {
                Storage::disk('public')->delete($menu->image_path);
            }
            $path = $request->file('image')->store('menus', 'public');
            $validated['image_path'] = $path;
        }

        $menu->update($validated);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu mis à jour avec succès.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->image_path) {
            Storage::disk('public')->delete($menu->image_path);
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu supprimé avec succès.');
    }
}
