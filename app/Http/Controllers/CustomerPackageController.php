<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Services;
use Illuminate\Http\Request;

class CustomerPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $packages = Package::with('services')->get();
        $services = Services::orderBy('created_at', direction: 'desc')->get();
        return view("customer.packages",compact('packages','services'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
