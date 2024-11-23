<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreContactRequest;
use App\Models\Car;
use App\Models\Contact;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function login()
{
    return view('customer.login'); 
}

public function register()
{
    return view('customer.register');
}

    public function home()
    {
    
        
        $users = User::paginate(5);;
       
        return view('admin.users.index',compact('users'));
    }
    public function about()
    {
        return view('customer.about');
    }
 
    public function index()
    {
        
        $users = User::paginate(5);
       
        return view('admin.users.index',compact('users'));
    }
    public function contact()
    {
       $services= Services::all();

        return view("customer.contact",compact('services'));
    }
    public function store(StoreContactRequest $request)
    {
        //   dd($request->all());
//    $validateData= $request->validate([
//         'name'=>['required','min:5'],
//         'email'=>['required','email'],
//         'subject'=>['required','min:5'],
//         'message'=>['required','min:10'],
//     ]);


        $validateData = $request->validated();
     
        Contact::create($validateData);
        return back()->with('status', 'Your message has been sent successfully!');
    }


    /////////////////////////////////////////////////////////////////////////
    public function display(){
        $data=Contact::paginate(5);
        return view("customer.display-contacts",compact('data'));
    }
    public function show(string $id)
    {

     $user = User::with('car')->find($id);
        
    
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
    
        return response()->json([
            'success' => 'User loaded successfully.',
            'user' => $user
        ]);
    }
    public function update(Request $request, string $id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found.'], 404);
    }

    // Validate the incoming data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'nullable|string|max:15',
        'registration_date' => 'nullable|date',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Update user details
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->phone = $validated['phone'] ?? $user->phone;
    $user->registration_date = $validated['registration_date'] ?? $user->registration_date;

    if ($request->hasFile('image')) {
        // Handle image upload
        $imagePath = $request->file('image')->store('users', 'public');
        $user->image = $imagePath;
    }

    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'User updated successfully.',
        'user' => $user
    ]);
}

    

public function destroy(string $id)
{
    $user = User::findOrFail($id);

    if (!$user) {
        return redirect()->back()->with('error', 'user not found.');
    }
    $user->delete();
    return redirect()->back()->with('success', 'user deleted successfully.');
}


}
