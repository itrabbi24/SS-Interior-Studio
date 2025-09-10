<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin-panel.categories.index', compact('categories'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
    ]);

    $category = Category::create(['name' => $request->name]);

    return response()->json(['success' => true, 'id' => $category->id]);
}


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update(['name' => $request->name]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['success' => true]);
    }
}
