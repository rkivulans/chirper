<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $sellers = User::orderBy($sortField, $sortDirection)->get();

        return view('sellers.index', compact('sellers', 'sortField', 'sortDirection'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $seller, Request $request): View
    {
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $products = $seller->products()->orderBy($sortField, $sortDirection)->get();

        return view('sellers.show', compact('seller', 'products', 'sortField', 'sortDirection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
