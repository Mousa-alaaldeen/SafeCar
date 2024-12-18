<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminAllUsersController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminBookingServiceController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminServicesController;
use App\Http\Controllers\Admin\AdminSubscriptionController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//CUSTOMER ROUTES
Route::controller(CustomerController::class)->name('customer.')->group(function() {
    Route::get('/', 'home')->name('home');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/displayContacts', 'display')->name('display');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
});

// Contact form submission route
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// About page route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Post and Comment routes
Route::resource('posts', PostController::class);
Route::resource('comment', CommentController::class);

// Dashboard route (protected by auth and verified middleware)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Customer bookings routes
Route::get('customer-bookings', [BookingController::class, 'index'])->name('customer-bookings.index');
Route::get('customer-bookings/create', [BookingController::class, 'create'])->name('customer-bookings.create');
Route::post('customer-bookings', [BookingController::class, 'store'])->name('customer-bookings.store');
Route::post('customer-bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('customer-bookings.updateStatus');
Route::delete('customer-bookings/{id}', [BookingController::class, 'destroy'])->name('customer-bookings.destroy');


// Customer Services
Route::get('/customer-services', [CustomerServiceController::class, 'index'])->name('customer-services');

// Admin routes (protected by auth and is_admin middleware)
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    // Admin dashboard
    Route::resource('dashboard', AdminDashboardController::class);
    
    // Admin services and subscriptions
    Route::resource('/services', AdminServicesController::class);
    Route::resource('/subscription', AdminSubscriptionController::class);
    
    // Admin bookings and employees
    Route::resource('/bookings', AdminBookingController::class);
    Route::resource('/booking-services', AdminBookingServiceController::class);
    Route::resource('/employees', AdminEmployeeController::class);
    Route::get('admin/contact', [AdminContactController::class, 'index'])->name('admin-contact');
    // Route to show the contact details
Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('admin-contact.show');

    // Review routes for admin
    Route::resource('/review', ReviewController::class);
    
    // Custom route to delete booking services
    Route::delete('booking-services/{booking_id}/{service_id}', [AdminBookingServiceController::class, 'destroy'])->name('booking-services.destroy');
    
    // Show and update booking services
    Route::get('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'show'])->name('booking-services.show');
    Route::put('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'update'])->name('booking-services.update');
    Route::put('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'store'])->name('booking-services.store');
    Route::delete('booking-services/{booking_id}/{service_id}', [AdminBookingServiceController::class, 'destroy'])->name('booking-services.destroy');


    Route::get('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'show'])->name('booking-services.show');
    
    Route::put('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'update'])->name('booking-services.update');
    
    Route::put('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'store'])->name('booking-services.store');
    Route::resource('/admin-bookings',AdminBookingController::class);

    Route::resource('/package',PackageController::class);
    Route::resource('/users',AdminAllUsersController::class);
    Route::resource('/bookings-services',AdminBookingServiceController::class);
    Route::get('/admin-users', [AdminAllUsersController::class, 'search'])->name('users.search');
});


require __DIR__.'/auth.php';