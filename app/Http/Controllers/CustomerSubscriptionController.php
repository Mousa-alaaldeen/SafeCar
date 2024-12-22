<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class CustomerSubscriptionController extends Controller
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
    $request->validate([
        'package_id' => 'required|exists:packages,id',
        
    ]);
    
  

    Subscription::create([
        'users_id' => Auth::id(),
        'package_id' => $request->package_id,
        'start_date' => Carbon::now(),
        'end_date' => Carbon::now()->addMonth(),  
        'plan_type' => 'Monthly', 
    ]);
  
    return back()->with('success', 'Subscription successfully created.');
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
