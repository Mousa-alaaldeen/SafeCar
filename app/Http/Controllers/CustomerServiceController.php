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
    public function indexPackages()
    {
        
        $packages = Package::with('services')->get();
        $services = Services::orderBy('created_at', direction: 'desc')->get();
        return view("customer.packages",compact('packages','services'));
    }
    
}
