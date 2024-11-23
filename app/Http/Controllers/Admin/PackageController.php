<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Car;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::paginate(20);
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request)
    {
        $validatedData=$request->validated();
        $package = Package::create([
            'name' => $validatedData['name'],
            'size' => $validatedData['size'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        ]);
    
        
        if ($package) {
            return response()->json([
                'success' => true,
                'message' => 'package added successfully!',
                'service' => $package,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add the package.',
            ], 500); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::all();
        $package = Package::find($id);
    
        if (!$package) {
            return response()->json(['error' => 'Package not found.'], 404);
        }
    
        return response()->json([
            'success' => 'Package loaded successfully',
            'package' => $package,
            'car' => $car,
        ]);
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
    public function update(PackageRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $package = Package::findOrFail($id);
        $package->name = $validatedData['name'];
        $package->price=$validatedData['price'];
        $package->description=$validatedData['description'];
        $package->size=$validatedData['size'];
        $package->duration=$validatedData['duration'];
        $package->save();
        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully!',
            'package' => $package  
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);

        if (!$package) {
            return redirect()->back()->with('error', 'Package not found.');
        }
        $package->delete();
        return redirect()->back()->with('success', 'Package deleted successfully.');
    }
}
