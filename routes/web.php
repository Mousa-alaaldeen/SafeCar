<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
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
    Route::get('/services','services')->name('services');
    Route::get('/contact','contact')->name('contact');
    Route::post('/contact/store','store')->name('contact.store');
    Route::get('/displayContacts','display')->name('display');
    // Route::get('/login','login')->name('login');
    // Route::get('/register','register')->name('register');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



