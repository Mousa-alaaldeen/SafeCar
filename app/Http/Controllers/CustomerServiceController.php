<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Services;
use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function  index()
    {
    
        $packages = Package::with('services')->get();
       
        $services = Services::orderBy('created_at', direction: 'desc')->get();
        return view("customer.services",compact('packages','services'));
    }
   
    public function showServices(Request $request)
{
    $search = $request->input('search');
    
    if ($search) {
        $services = Services::where('name', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%")
                            ->orderBy('created_at', 'desc')
                            ->get();
    } else {
        $services = Services::orderBy('created_at', 'desc')->get();
    }

    return view('customer.services', compact('services'));
}
}
