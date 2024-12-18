<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'review', 'salary', 'image', 'email', 'phone','service_id', 'start_date',];

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id');
    }
    public function getYearsExperienceAttribute()
{
    if (!$this->start_date) {
        return 0; 
    }

    return Carbon::parse($this->start_date)->diffInYears(Carbon::now());
}

}
