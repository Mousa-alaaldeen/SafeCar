<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('customer.register'); 
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {
      
        $validated = $request->validated();

        // Handle image upload if present
        if ($request->hasFile('car_image')) {
            $imagePath = $request->file('car_image')->store('car_images', 'public');
            $validated['car_image'] = $imagePath;
        }

        // Hash the password
        $validated['password'] = Hash::make($validated['password']);

        // Create the user with all validated data, including the image path
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'car_size' => $validated['car_size'],
            'car_type' => $validated['car_type'],
            'car_model' => $validated['car_model'],
            'car_license_plate' => $validated['car_license_plate'],
            'car_image' => $validated['car_image'] ?? null,
            'password' => $validated['password'],
        ]);

        // Trigger the registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to the login page
        return to_route('login');
    }
}
