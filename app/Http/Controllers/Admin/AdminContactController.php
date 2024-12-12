<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    // Method to show contact page
    public function index()
    {
        $contacts = Contact::paginate(20);
        return view('admin.contact.index', compact('contacts'));
    }

    // Other methods for handling contact forms or any other logic
}
