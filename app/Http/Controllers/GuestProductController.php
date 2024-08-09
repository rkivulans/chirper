<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuestProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request): View
    {
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $products = Product::orderBy($sortField, $sortDirection)->get();

        return view('guest.products.index', compact('products', 'sortField', 'sortDirection'));
    }
}
