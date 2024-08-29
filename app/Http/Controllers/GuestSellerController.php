<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuestSellerController extends Controller
{
    /**
     * Display a listing of the sellers.
     */
    public function index(Request $request): View
    {
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $sellers = User::orderBy($sortField, $sortDirection)->get();

        return view('guest.sellers.index', compact('sellers', 'sortField', 'sortDirection'));
    }

    /**
     * Display the specified seller and their products.
     */
    public function show(User $guest_seller, Request $request): View
    {
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $products = $guest_seller->products()->orderBy($sortField, $sortDirection)->get();

        return view('guest.sellers.show', compact('guest_seller', 'products', 'sortField', 'sortDirection'));
    }
}
