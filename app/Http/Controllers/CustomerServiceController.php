<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function  index()
    {
        $services = Services::orderBy('created_at', direction: 'desc')->get();
        return view("customer.services");
    }
    
}
