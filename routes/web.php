<?php

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

});