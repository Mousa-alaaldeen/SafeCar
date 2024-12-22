<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price_small', 'price_medium', 'price_large', 'description',];

    public function contacts()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    // public function Booking()
    // {
    //     return $this->hasMany(Booking::class);
    // }
    public function bookings()
    {
        return $this->hasMany(Booking::class, );
    }
    public function bookingServices()
    {
        return $this->hasMany(BookingService::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class, 'service_id');
    }
    public function packages()
    {
        return $this->hasMany(Package::class, 'package_service');
    }
    public function packageServices()
    {
        return $this->hasMany(PackageServices::class);
    }
    

public function getPriceByCarSize($carSize)
{
    switch ($carSize) {
        case 'Small':
            return $this->price_small;
        case 'Medium':
            return $this->price_medium;
        case 'Large':
            return $this->price_large;
        default:
            return $this->null; 
    }
}


}
