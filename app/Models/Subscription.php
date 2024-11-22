<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; // إضافة هذه السطر

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'plan_type', 'start_date', 'end_date'];

    protected $casts = [
        'start_date' => 'datetime',  
        'end_date' => 'datetime',    
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
