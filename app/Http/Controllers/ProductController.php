<?php

namespace App\Http\Controllers;

use App\Models\Category;
// Importē Category modeli
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sortField = $request->input('sort', 'name'); // default sort field
        $sortDirection = $request->input('direction', 'asc'); // default sort direction

        $products = Product::with('user')
            ->orderBy($sortField, $sortDirection)
            ->get();

        return view('products.index', [
            'products' => $products,
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
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $request->user()->products()->create($validated);

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        Gate::authorize('update', $product);
        // Iegūstam visas kategorijas
        $categories = Category::orderBy('name', 'asc')
            ->get();

        return view('products.edit', [
            'product' => $product,
            // Nododam kategorijas skatam
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        Gate::authorize('update', $product);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            // Validācija kategorijai
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product->update($validated);

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        Gate::authorize('delete', $product);

        $product->delete();

        return redirect(route('products.index'));
    }
}
