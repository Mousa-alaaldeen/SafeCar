<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable=[ 
    'name',
    'description',
    'duration',
    'price',
     'size'
];
public function subscriptions()
{
    return $this->hasOne(Subscription::class);
}
}
