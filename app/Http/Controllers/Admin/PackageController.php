<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Car;
use App\Models\Package;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Symfony\Component\String\b;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::paginate(20);
        $services= Services::all();
        return view('admin.package.index', compact('packages','services'));
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
    // Controller code

    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
       
        'duration' => 'required|string',
        'size' => 'required|string',
        'price' => 'required|numeric',
        'service_id' => 'required|array', // Ensure it's an array
        'service_id.*' => 'exists:services,id', // Validate each service ID
    ]);

    try {
        // Create the package
        $package = Package::create([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'size' => $request->size,
            'price' => $request->price,
        ]);

        // Attach services to the package
        $package->services()->attach($request->service_id);

        // Return back with a success message
        return back()->with('success', 'Package and services added successfully!');
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Error adding package: ' . $e->getMessage());

        // Return back with an error message
        return back()->withErrors(['error' => 'Failed to add package. Please try again.']);
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
        $package->price = $validatedData['price'];
        $package->description = $validatedData['description'];
        $package->size = $validatedData['size'];
        $package->duration = $validatedData['duration'];
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
