<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
       
        $completedBookings = Booking::where('user_id', Auth::id())->where('status', 'Completed')->count();
        $cancelledBookings = Booking::where('user_id', Auth::id())->where('status', 'Cancelled')->count();
        $bookings = Booking::orderBy('booking_date', 'desc')->with('service')
            ->where('user_id', Auth::id())
            ->orderBy('booking_date', 'desc')->get();
            return view('profile.edit', compact('bookings', 'completedBookings', 'cancelledBookings'))->with('user', $request->user());
   
    }

    /**
     * Update the user's profile information.
     */
  
     public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    try {
        if ($request->hasFile('car_image')) {
            if ($user->car_image && file_exists(storage_path('app/public/users/' . $user->car_image))) {
                unlink(storage_path('app/public/users/' . $user->car_image));
            }

            $car_imageName = time() . '.' . $request->car_image->extension();
            $request->car_image->storeAs('public/users', $car_imageName);
            $user->car_image = $car_imageName;
        }

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        session()->flash('status', 'Profile updated successfully!');
    } catch (\Exception $e) {
 
        session()->flash('error', 'There was an error updating the profile.');
    }

    return Redirect::route('profile.edit');
}

    
    
    public function showProfile(Request $request)
    {
    
        $user = $request->user();
        $bookings = $user->bookings;
        $completedBookings = $bookings->where('status', 'Completed')->count();
        $cancelledBookings = $bookings->where('status', 'Cancelled')->count();
    
        return view('profile.edit', compact('user', 'bookings', 'completedBookings', 'cancelledBookings'));
    }
    
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    

}
