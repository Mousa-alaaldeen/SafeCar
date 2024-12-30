<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    use HasFactory;

    public $incrementing = false; 
    protected $fillable = ['booking_id', 'service_id'];

    public $timestamps = true;

    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class,'service_id');
    }
   


}
