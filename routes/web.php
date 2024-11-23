<?php

use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminBookingServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminServicesController;
use App\Http\Controllers\Admin\AdminSubscriptionController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });
//CUSTOMER ROUTES
Route::controller(CustomerController::class)->name('customer.')->group(function(){

    Route::get('/','home')->name('home');
    
    Route::get('/about','about')->name('about');
    Route::get('/contact','contact')->name('contact');
    // Route::post('/contact/store','store')->name('contact.store');
    Route::get('/displayContacts','display')->name('display');

    // Route::get('/login','login')->name('login');
    // Route::get('/register','register')->name('register');

});


Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');



//post Route
Route::resource('posts',PostController::class);
Route::resource('posts',PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('dashboard', AdminController::class);
});
// Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
//     Route::resource('services', AdminController::class);
// });
Route::get('/customer-services', [CustomerServiceController::class, 'index'])->name('customer-services');
Route::resource('/services',AdminServicesController::class);
Route::resource('/subscription',AdminSubscriptionController::class);
Route::resource('/customer',CustomerController::class);
Route::get('/users/{id}', [CustomerController::class, 'show'])->name('users.show');
Route::put('/users/{id}', [CustomerController::class, 'update'])->name('users.update');
Route::resource('bookings', AdminBookingController::class);
Route::resource('/bookings-services',AdminBookingServiceController::class);


Route::delete('booking-services/{booking_id}/{service_id}', [AdminBookingServiceController::class, 'destroy'])->name('booking-services.destroy');


Route::get('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'show'])->name('booking-services.show');

Route::put('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'update'])->name('booking-services.update');

Route::put('/booking-services/{bookingId}/{serviceId}', [AdminBookingServiceController::class, 'store'])->name('booking-services.store');
Route::resource('/employees',AdminEmployeeController::class);
Route::resource('/package',PackageController::class);


require __DIR__.'/auth.php';


