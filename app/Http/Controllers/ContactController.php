<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */

     public function store(StoreContactRequest $request)
     {

         $validateData = $request->validated(); 
         Contact::create($validateData); 
         return back()->with('status', 'Your message has been sent successfully!');
     }
     
    public function __invoke(Request $request)
    {
        //
    }
}
