<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::latest()->get();
        return view('admin-panel.portfolio-categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:portfolio_categories,name',
        ]);

        $category = PortfolioCategory::create(['name' => $request->name]);

        return response()->json(['success' => true, 'id' => $category->id]);
    }

    public function update(Request $request, $id)
    {
        $category = PortfolioCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:portfolio_categories,name,' . $category->id,
        ]);

        $category->update(['name' => $request->name]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $category = PortfolioCategory::findOrFail($id);
        
        // Check if category has projects
        if ($category->projects()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category with associated projects.'
            ], 422);
        }
        
        $category->delete();

        return response()->json(['success' => true]);
    }
}