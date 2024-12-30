<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable=[ 
    'name',

    'duration',
    'price',
     'size'
];
public function subscriptions()
{
    return $this->hasOne(Subscription::class);
}

public function services()
{
    return $this->belongsToMany(Services::class, 'package_services', 'package_id', 'service_id');
}




}
