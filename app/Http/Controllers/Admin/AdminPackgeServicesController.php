<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageServices;
use Illuminate\Http\Request;

class AdminPackgeServicesController extends Controller
{
    public function index(){
        return view('admin.packageservices.index');
    }
    public function create(){
       
    }
     
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'package_id' => ['required', 'exists:packages,id'], // Ensure the package exists
            'service_id' => ['required', 'exists:services,id'], // Ensure the service exists
        ]);
    
        // Create a new entry in the PackageServices table
        $packageService = new PackageServices();
        $packageService->package_id = $request->package_id;
        $packageService->service_id = $request->service_id;
        $packageService->save();
    
        // Redirect back with a success message
        return back()->with('status', 'Package Service created successfully!');
    }
    
}
