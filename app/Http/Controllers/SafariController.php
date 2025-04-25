<?php

namespace App\Http\Controllers;

use App\Models\Safari;
use Illuminate\Http\Request;

class SafariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Safari $safari)
    {
        // Route model binding automatically fetches the Safari by slug
        return view('safaris.show', compact('safari'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Safari $safari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Safari $safari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Safari $safari)
    {
        //
    }
}
