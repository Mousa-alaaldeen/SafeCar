<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'plan_type',
        'start_date',
        'end_date',
        'package_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }



}
