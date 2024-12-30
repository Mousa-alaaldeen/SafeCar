<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'booking_date',
        'status',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id');
    }
  
    
    public function bookingServices()
    {
        return $this->hasMany(BookingService::class);
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class,);
    }
    
public function getPriceByCarSize()
{
    if ($this->service) {
        return $this->service->getPriceByCarSize($this->car_size); 
    }
    return 0; 
}





}
