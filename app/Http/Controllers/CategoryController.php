<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; // Importē Product modeli
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $categories = Category::orderBy($sortField, $sortDirection)->get();

        return view('categories.index', [
            'categories' => $categories,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($validated);

        return redirect(route('categories.index'))->with('added', __('Category successfully added.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return redirect(route('categories.index'))->with('updated', __('Category successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        // Noņem kategoriju no visiem produktiem, kuriem šī kategorija ir pievienota
        Product::where('category_id', $category->id)->update(['category_id' => null]);

        // Dzēš kategoriju
        $category->delete();

        return redirect()->route('categories.index')->with('deleted', __('Category successfully deleted.'));
    }
}
