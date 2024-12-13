<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Services;
use Illuminate\Http\Request;

class AdminServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $services = Services::orderBy('created_at', direction: 'desc')-> paginate(20);
        return view('admin.service.index', compact('services'));
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
    public function store(UpdateServiceRequest $request)
    {
    
        $validatedData = $request->validated();
        
     
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newImageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('services', $newImageName, 'public');
            $validatedData['image'] = $newImageName;
        }
    
  
        $service = Services::create([
            'name' => $validatedData['name'],
            'image' => $validatedData['image'] ?? null,
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        ]);
    
        
        if ($service) {
            return response()->json([
                'success' => true,
                'message' => 'Service added successfully!',
                'service' => $service,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add the service.',
            ], 500); 
        }
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Services::find($id);
    
        if (!$service) {
            return response()->json(['error' => 'Service not found.'], 404);
        }
    
       
        return response()->json([
            'success' => 'Service loaded successfully.',
            'service' => $service
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
    public function update(UpdateServiceRequest $request, string $id)
    {
     
        $validatedData = $request->validated();
        $service = Services::findOrFail($id);
        $service->name = $validatedData['name'];
        $service->price=$validatedData['price'];
        $service->description=$validatedData['description'];

        if ($request->hasFile('image')) {
            if ($service->image && file_exists(storage_path('app/public/services/' . $service->image))) {
                unlink(storage_path('app/public/services/' . $service->image));
            }
            $imageName = time() . '.' . $request->image->extension(); 
            $request->image->storeAs('public/services', $imageName);  
            $service->image = $imageName; 
        }
    
        $service->save();
        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Services::findOrFail($id);

        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

}