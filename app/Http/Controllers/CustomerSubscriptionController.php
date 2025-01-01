<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\Package;
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
     
         $userId = Auth::id();
         $packageId = $request->package_id;
         $requestedSize =Auth::user()->car_size;
     
        
         $package = Package::find($packageId);
     
         if (!$package || $package->size != $requestedSize) {
             return back()->withErrors(['error' => 'The selected package size does not match the required size.']);
         }
     
        
         $activeSubscription = Subscription::where('users_id', $userId)
             ->where('package_id', $packageId)
             ->where('end_date', '>=', Carbon::now()) 
             ->first();
     
         if ($activeSubscription) {
             return back()->withErrors(['error' => 'You already have an active subscription for this package.']);
         }
     
     
         Subscription::create([
             'users_id' => $userId,
             'package_id' => $packageId,
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
